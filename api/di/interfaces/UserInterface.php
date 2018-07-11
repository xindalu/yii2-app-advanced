<?php

namespace api\di\interfaces;

interface UserInterface
{
    public function getUserById($id);

    public function login($userName, $password);

    public function logout();

    public function all();
}
