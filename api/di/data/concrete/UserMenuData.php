<?php

namespace api\di\data\concrete;

use api\di\data\db\ConcreteDb;

class UserMenuData extends ConcreteDb
{
    public function all()
    {
        $command = $this->db->createCommand("SELECT MENU_USER, MENUTEXT FROM USER_MENU");
        return $command->queryAll();
    }
}
