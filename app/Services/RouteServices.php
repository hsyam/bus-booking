<?php


namespace App\Services;


use App\Contracts\Services\BaseService;
use App\Repositories\RouteRepository;
use Illuminate\Support\Facades\DB;


class RouteServices extends BaseService
{
    protected  $repo ;
    public function __construct(RouteRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Not Best Practices but in the future we should use SQL query optimization for optimizing data collection
     * instate of use laravel collection and filter large of data as array objects
     * Not good in large scale projects
     * @param $start_station
     * @param $end_station
     */
    public function getListOfRoutesIdsByStartAndEndStations($start_station , $end_station)
    {
        return $this->repo->newQueryBuilder()->whereHas('stations' , function ($q)use($start_station , $end_station){
            $q->whereIn('station_id' , [$start_station , $end_station]);
        })->with('stations')->get()->reject(function ($q)use($start_station , $end_station){
            if (!collect($q->stations)->where('id' , $start_station)->first() || is_null(collect($q->stations)->where('id' , $end_station)->first())  ){
                return true;
            }
            if (collect($q->stations)->where('id' , $start_station)->first()->pivot->station_order  >    collect($q->stations)->where('id' , $end_station)->first()->pivot->station_order){
                return true;
            }
        })->pluck('id');
    }

    public function getStationOrderInRoute($route_id , $station_id)
    {
        return DB::table('routes_stations')->where('route_id' , $route_id)
            ->where('station_id', $station_id)->get('station_order')->first()->station_order;
    }

    public function getListOfRoutesIdsByStartAndEndStationsWithStationsOrders($start_station , $end_station) :array
    {
        $ids = $this->getListOfRoutesIdsByStartAndEndStations($start_station,$end_station);
        return collect($ids)->map(function ($id)use($start_station,$end_station){
            return [
                'route_id' => $id,
                'start_station_order' =>  $this->getStationOrderInRoute($id,$start_station),
                'end_station_order' =>  $this->getStationOrderInRoute($id,$end_station),
                ];
        })->toArray();
    }

}
