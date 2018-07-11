<?php

namespace api\di\services;

use api\di\data\main\UserData;
use api\di\interfaces\UserInterface;

class UserService implements UserInterface
{
    /**
     * @var UserData
     */
    private $userData;

    public function __construct(UserData $userData)
    {
        $this->userData = $userData;
    }

    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
    }

    public function login($userName, $password)
    {
        // TODO: Implement login() method.
    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }

    public function all()
    {
        return $this->userData->all();
    }
}
