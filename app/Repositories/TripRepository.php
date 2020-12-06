<?php


namespace App\Repositories;


use App\Contracts\Repositories\BaseRepository;
use App\Models\Route;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;

class TripRepository extends BaseRepository
{
    public function __construct(Trip $model)
    {
        parent::__construct($model);
    }

}
