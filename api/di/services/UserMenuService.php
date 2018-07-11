<?php

namespace api\di\services;

use api\di\data\concrete\UserMenuData;
use api\di\interfaces\UserMenuInterface;

class UserMenuService implements UserMenuInterface
{
    private $userMenuData;

    public function __construct(UserMenuData $userMenuData)
    {
        $this->userMenuData = $userMenuData;
    }

    public function all()
    {
        return $this->userMenuData->all();
    }
}
