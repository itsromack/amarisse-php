<?php

namespace Raw\Data;

use \PDO;
use \PDOException;
use Raw\Data\DatabaseInterface;

class MySQLDatabase implements DatabaseInterface
{
    const DEFAULT_CHARSET = 'utf8mb4';

    protected $config;
    protected $connection;
    protected $options = [
        PDO::ATTR_PERSISTENT => true,  
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
    ];
    protected $dsn;
    protected $error = null;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function connect()
    {
        $this->buildDSN();

        try {
            $this->connection = new PDO(
                $this->dsn,
                $this->config['user'],
                $this->config['pass'],
                $this->options
            );
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

        return $this->connection;
    }

    protected function buildDSN()
    {
        $this->dsn = "mysql:{$this->config['host']};port={$this->config['port']};dbname={$this->config['name']};charset=" . self::DEFAULT_CHARSET;
    }
}