<?php

namespace Raw\Data;

use Raw\Data\MySQLDatabase;

class DatabaseFactory
{
    public static function getInstance($db_type = 'mysql', $config = [])
    {
        if ($db_type === 'mysql') {
            $db = new MySQLDatabase($config);

            return $db;
        }

        return null;
    }
}