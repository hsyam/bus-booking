<?php


namespace App\Contracts\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

interface BaseRepositoryInterface
{

    public function create(array $attributes);

    public function update(array $attributes): bool;

    public function whereIn(string $column , array $array);

    public function allQuery($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc' , array $with = []);

    public function all($columns = array ('*'), string $orderBy = 'id', string $sortBy = 'asc' , array $with = [] , int $paginate = 0);

    public function find($id);

    public function findOrFail($id);

    public function findOneByOrFail(array $data);

    public function delete(): bool;

    public function newQueryBuilder();

    public function findOneOrFail($id);

    public function findBy(array $data);

    public function findByIdWithRelation(int $id , array  $where = [] ,array  $with = [] );

    public function findOneBy(array $data);
}
