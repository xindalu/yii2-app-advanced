<?php

namespace api\di\data\db;

class MainDb extends BaseDb
{
    public function __construct()
    {
        $this->db = $this->getMainDb();
    }
}
