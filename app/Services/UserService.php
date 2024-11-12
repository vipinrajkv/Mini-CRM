<?php
namespace App\Services;
use App\Repositories\UserRepository;
use App\Models\User;

class UserService
{
    protected $userRepository;

    /**
     * UserService Constructor
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * User create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * user update
     *
     * @param array $data
     * @param User $user
     * @return void
     */
    public function update(array $data, User $user)
    {
        return $this->userRepository->update($data, $user);
    }

    /**
     * user update
     *
     * @param array $data
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        return $this->userRepository->delete($user);
    }
}