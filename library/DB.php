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
    private $stmt;

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


    public function ejecutarQuery(string $query, array $binds = [])
    {
        $queryLimpia = preg_replace('/\s+/', ' ', $query);
        $queryLimpia = trim($queryLimpia);

        // ver si tiene varios parametros a agregar
        $parametros = $this->parametros($queryLimpia);

        $this->stmt = $this->pdo->prepare($queryLimpia);

        if (count($parametros) > 0) {

            $this->bindParametros($parametros, $binds);
            $this->stmt->execute();
        } else {
            $this->stmt->execute();
        }
    }

    public function bindParametros(array $parametros = [], array $binds = [])
    {
        $coinciden = count($parametros) == count($binds);

        if ($coinciden) {
            for ($i = 0; $i < count($parametros); $i++) {
                $this->stmt->bindParam($parametros[$i], $binds[$i]);
            }
        } else {
            throw new \InvalidArgumentException('El número de parámetros y valores de vinculación no coinciden.');
        }
    }


    public function parametros(string $query)
    {
        $parametros = [];
        preg_match_all('/:\w+/', $query, $parametros);
        return $parametros;
    }


}