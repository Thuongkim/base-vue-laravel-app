<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 */
interface UserRepository extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getUsers($filter);

    /**
     * @return mixed
     */
    public function getUser($id);
}
