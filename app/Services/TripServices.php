<?php


namespace App\Services;


use App\Contracts\Services\BaseService;
use App\Models\Trip;
use App\Repositories\RouteRepository;
use App\Repositories\TripRepository;
use Illuminate\Support\Facades\DB;


class TripServices extends BaseService
{
    protected  $repo ;
    public function __construct(TripRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * get List of trips
     * loop for every route and get his trips then append start and end stations
     * we need stations orders at others services to validate Bus seats
     * @param array $routes
     * @param int $start_station
     * @param int $end_station
     * @return array
     */
     public function getListOfTripsForEachRoute(array  $routes,int $start_station ,int $end_station){
        $trips = array();
        foreach ($routes as $route){
            $trips[] = $this->repo->findBy(['route_id' => $route['route_id']])->map(function ($trip)use ($route){
                $trip['start_station_order'] = $route['start_station_order'];
                $trip['end_station_order'] = $route['end_station_order'];
                return $trip;
            })->first();
        }

        return $trips;
     }

    public function getTrips($list)
    {
        return $this->repo->whereIn('id' , $list)->load('route');
     }


    public function getTrip($id)
    {
        return $this->repo->find($id);
    }

}
