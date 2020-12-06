<?php


namespace App\Repositories;


use App\Contracts\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function createToken($user)
    {
        return $user->createToken('authToken')->accessToken;
    }
}
