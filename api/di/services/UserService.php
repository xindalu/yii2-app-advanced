<?php

namespace api\di\services;

use api\di\interfaces\UserInterface;

class UserService implements UserInterface
{
    public function show($id)
    {
        return $id;
    }

    public function all()
    {
        return 'all';
    }
}
