<?php


namespace App\Contracts\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

abstract class  BaseRepository implements BaseRepositoryInterface
{

    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data) : bool
    {
        return $this->model->update($data);
    }


    /**
     * @param string[] $columns
     * @param string $orderBy
     * @param string $sortBy
     * @param array $with
     * @return Builder
     */

    public function allQuery($columns = ['*'], string $orderBy = 'id', string $sortBy = 'desc' , array  $with = [])
    {
        return $this->model->orderBy($orderBy, $sortBy)->with([]) ;
    }

    /**
     * @param string[] $columns
     * @param string $orderBy
     * @param string $sortBy
     * @param array $with
     * @param int $paginate
     * @return Collection
     */

    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc' , array  $with = [] , int $paginate = 0)
    {
        if ($paginate == 0){
            return $this->allQuery()->get($columns);
        }
        return $this->allQuery()->paginate($paginate);

    }


    /**
     * @param string $id
     * @return Collection
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param  $id
     * @return Collection
     * @throws ModelNotFoundException
     */
    public function findOneOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function findBy(array $data) : Collection
    {
        return $this->model->where($data)->get();
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

    /**
     * @param array $data
     * @return Collection
     * @throws ModelNotFoundException
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete() : bool
    {
        return $this->model->delete();
    }


    /**
     * @param $id
     * @return Collection
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQueryBuilder(){
        return $this->model->newQuery();
    }

    /**
     * @param $id
     * @param array $where
     * @param array $with
     * @return Collection
     */
    public function findByIdWithRelation($id , $where = [] , $with = [] )
    {
        return $this->model->where('id' ,$id)->where($where)->with($with)->firstOrFail();
    }

    public function whereIn($column ,  $array) : Collection
    {
        return $this->model->whereIn($column  , $array)->get();
    }
}
