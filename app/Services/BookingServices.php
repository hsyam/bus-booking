<?php


namespace App\Services;


use App\Contracts\Services\BaseService;
use App\Repositories\RouteRepository;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;


class BookingServices extends BaseService
{
    protected  $routeServices ;
    protected  $tripServices ;
    protected  $seatServices ;
    public function __construct(RouteServices $routeServices , TripServices $tripServices ,SeatServices $seatServices)
    {
        $this->routeServices = $routeServices;
        $this->tripServices = $tripServices;
        $this->seatServices = $seatServices;
    }
    public function getValidTrips(int $start_station , int $end_station)
    {
        $routes = $this->routeServices->getListOfRoutesIdsByStartAndEndStationsWithStationsOrders($start_station, $end_station);
        $trips = $this->tripServices->getListOfTripsForEachRoute($routes , $start_station ,  $end_station);
        return $this->seatServices->filterAvailable($trips);
    }
    public function searchForBus(int $start_station , int $end_station)
    {
        return ($this->tripServices->getTrips($this->getValidTrips( $start_station , $end_station)));
    }

    public function BookBus(int $start_station , int $end_station , int $trip_id)
    {
        $trips_id = $this->getValidTrips( $start_station , $end_station);
        if (in_array($trip_id, $trips_id)){
            $trip = $this->tripServices->getTrip($trip_id);
            $start_station_order = $this->routeServices->getStationOrderInRoute($trip->route_id , $start_station);
            $end_station_order  = $this->routeServices->getStationOrderInRoute($trip->route_id , $end_station);
            if ( $this->seatServices->BookASeat($start_station , $start_station_order ,$end_station , $end_station_order , $trip_id , auth()->id())) {

                return true;
            }
        }
        return  false;
    }


}
