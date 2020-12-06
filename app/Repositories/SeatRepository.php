<?php


namespace App\Repositories;


use App\Contracts\Repositories\BaseRepository;
use App\Models\Route;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;

class SeatRepository extends BaseRepository
{
    public function __construct(Seat $model)
    {
        parent::__construct($model);
    }

}
