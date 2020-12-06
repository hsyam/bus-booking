<?php


namespace App\Repositories;


use App\Contracts\Repositories\BaseRepository;
use App\Models\Route;
use Illuminate\Database\Eloquent\Model;

class RouteRepository extends BaseRepository
{
    public function __construct(Route $model)
    {
        parent::__construct($model);
    }

}
