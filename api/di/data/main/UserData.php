<?php

namespace api\di\data\main;

use api\di\data\db\MainDb;

class UserData extends MainDb
{
    public function all()
    {
        $command = $this->db->createCommand("SELECT group_name, description, created_at, updated_at FROM `group`");
        return $command->queryAll();
    }

    public function setAccessToken()
    {

    }
}
