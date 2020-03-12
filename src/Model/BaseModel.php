<?php

namespace Raw\Model;

use Raw\Data\DatabaseFactory;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }
}