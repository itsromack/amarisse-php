<?php

namespace Raw\Data;

use Raw\Data\MySQLDatabase;

class DatabaseFactory
{
    public static function getInstance($db_type = 'mysql', $config = [])
    {
        if ($db_type === 'mysql') return new MySQLDatabase($config);

        return null;
    }
}