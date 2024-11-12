<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository 
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserRepository Constructor
     *
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * User create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->user->create($data);
    }

    /**
     *  User update
     *
     * @param array $data
     * @param User $user
     * @return void
     */
    public function update(array $data,  User $user)
    {
        $user->update($data);
    }

    /**
     * User delete
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        $user->delete();
    }
} 