<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return mixed
     */
    public function getUsers($filter)
    {
        return $this->userRepository->getUsers($filter);
    }

    /**
     * @return mixed
     */
    public function getUser($id)
    {
        return $this->userRepository->getUser($id);
    }

    public function update($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
