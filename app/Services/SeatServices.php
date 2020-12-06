<?php


namespace App\Services;


use App\Contracts\Services\BaseService;
use App\Repositories\SeatRepository;



class SeatServices extends BaseService
{
    protected  $repo ;
    public function __construct(SeatRepository $repo)
    {
        $this->repo = $repo;
    }

    public function filterAvailable( $trips){
        $trips_ids = array();
        foreach ($trips as $trip){
            if ($this->getSeatCounts($trip->id ,$trip->start_station_order , $trip->end_station_order) < 12){
                 $trips_ids[] = $trip->id;
            }
        }
        return $trips_ids;
    }

    public function getSeatCounts($trip_id , $start_station_order , $end_station_order)
    {

        return $this->repo->newQueryBuilder()
            ->where('start_station_order' ,'<=' , $start_station_order)
            ->where('end_station_order' , '>=',$end_station_order)
            ->where('trip_id',$trip_id)
            ->count();
    }

    public function BookASeat($start_station , $start_station_order ,$end_station , $end_station_order , $trip_id , $user_id)
    {
        return $this->repo->create([
            'trip_id' => $trip_id,
            'start_station_id' => $start_station ,
            'end_station_id' => $end_station,
            'start_station_order' => $start_station_order,
            'end_station_order' => $end_station_order,
             'is_trip_finished' => 0
        ]);
    }

}
