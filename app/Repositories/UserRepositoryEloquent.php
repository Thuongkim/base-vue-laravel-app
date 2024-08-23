<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Validators\UserValidator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent.
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return UserValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function getUsers($filter, $type = null, $isPaginate = true)
    {
        $orderBy = $filter['order_by'] ?? 'id';
        $orderType = $filter['order_type'] ?? 'desc';
        $query = $this->getUserQuery();

        $query = $query->when($filter['id'] ?? null, function (Builder $query, $id) {
            $query->where('users.id', $id);
        })
            ->when($filter['name'] ?? null, function (Builder $query, $name) {
                $query->where('name', 'like', '%'.$name.'%');
            })
            ->when($filter['email'] ?? null, function (Builder $query, $email) {
                $query->where('email', 'like', '%'.$email.'%');
            })
            ->when($filter['created_at_start'] ?? null, function (Builder $query, $createdAtStart) {
                $query->where('users.created_at', '>=', $createdAtStart);
            })
            ->when($filter['created_at_end'] ?? null, function (Builder $query, $createdAtEnd) {
                $query->where('users.created_at', '<=', $createdAtEnd);
            })
            ->orderBy($orderBy, $orderType);

        return $query->get();
    }

    public function getUserQuery()
    {
        return $this->model->select([
            'users.id',
            'users.name',
            'users.email',
            'users.created_at',
        ]);
    }

    /**
     * @return mixed
     */
    public function getUser($id)
    {
        $query = $this->getUserQuery();
        $query->where('users.id', $id);

        return $query->first();
    }
}
