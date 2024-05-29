<?php

namespace Library;

use Exception;
use PDO;

class DB
{
    private $pdo;
    private $dsn;
    private $username;
    private $password;

    public function __construct()
    {
        $config = include __DIR__ . "/../config/autoload/global.php";
        $this->dsn = $config['dsn'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->conectar();
    }


    public function conectar()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (\PDOException $e) {
            throw new Exception("Error al conectar a la base de datos" . $e->getMessage());
        }
    }

}