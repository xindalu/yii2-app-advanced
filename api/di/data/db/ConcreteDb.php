<?php

namespace api\di\data\db;

class ConcreteDb extends BaseDb
{
    public function __construct()
    {
        $this->db = $this->getConcreteDb();
    }
}
