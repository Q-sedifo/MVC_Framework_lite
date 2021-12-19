<?php

namespace core;

use PDO;

class Db 
{
    protected $db;
    private $config;

    public function __construct()
    {
        $this->config = require 'config/dbConfig.php';
        $this->connection();
    }

    private function connection()
    {
        $config = $this->config;
        $this->db = new PDO('mysql:host='.$config['host'].'; dbname='.$config['name'].'; charset='.$config['charset'].'', $config['user'], $config['password']);
    }

}