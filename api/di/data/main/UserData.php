<?php

namespace api\di\data\main;

use api\di\data\db\MainDb;

class UserData extends MainDb
{
    public function all()
    {
        $command = $this->db->createCommand("SELECT group_name, description FROM `group`");
        return $command->queryColumn();
    }
}
