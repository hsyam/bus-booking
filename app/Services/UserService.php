<?php


namespace App\Services;


 use App\Contracts\Services\BaseService;
use App\Repositories\UserRepository;

class UserService extends BaseService
{
    protected  $repo ;
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function registerUser(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->repo->create($data);
    }

    public function createToken($user)
    {
        return $this->repo->createToken($user);
    }

    public function getAuthUser()
    {
        return auth()->user();
    }
}
