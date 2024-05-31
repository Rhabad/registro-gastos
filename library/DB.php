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
        $campos = $this->binds($queryLimpia);

        // primera palabra de la consulta
        $primeraPalabra = explode(" ", $queryLimpia)[0];

        $this->stmt = $this->pdo->prepare($queryLimpia);

        if (count($campos) > 0) {


            $this->bindParametros($campos, $binds);

            // SELECT, UPDATE, DELETE, INSERT
            return $this->ejecutar($primeraPalabra);
        } else {
            return $this->ejecutar($primeraPalabra);
        }
    }

    /**
     * mapea los parametros
     */
    public function bindParametros(array $campos = [], array $binds = [])
    {
        $coinciden = count($campos) == count($binds);

        if ($coinciden) {
            for ($i = 0; $i < count($campos); $i++) {
                $this->stmt->bindParam($campos[$i], $binds[$i]);
            }
        } else {
            throw new \InvalidArgumentException('El número de parámetros y valores de vinculación no coinciden.');
        }
    }


    /**
     * te extrae las palabrsa que empiezen con : 
     * ejemplo ->    :ejemplo
     */
    public function binds(string $query)
    {
        $binds = [];
        preg_match_all('/:\w+/', $query, $binds);

        $bindeos = [];
        foreach ($binds as $bind) {
            $bindeos = str_replace(':', '', $bind);
        }

        return $bindeos;
    }


    /**
     * dependiendo de la consulta (select, insert, etc)
     * hara cosas diferentes.
     */
    public function ejecutar($primeraPalabra)
    {
        $registros = [];

        // SELECT, UPDATE, DELETE, INSERT
        switch (strtolower($primeraPalabra)) {
            case "select":

                $this->stmt->execute();
                while ($row = $this->stmt->fetch(PDO::FETCH_OBJ)) {
                    $registros[] = $row;
                }
                break;

            case "update":

                $this->stmt->execute();
                break;
            case "delete":

                $this->stmt->execute();
                break;
            case "insert":

                $this->stmt->execute();
                break;
        }

        return $registros;
    }

}