<?php

namespace Models\Establecimiento\Gateway;

use Library\DB;
use Models\Establecimiento\Model\Establecimiento;

class EstablecimientoGw
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function crearEstablecimiento(Establecimiento $establecimiento)
    {
        $query = 'INSERT INTO
            establecimiento_comercial (nombre_establ, zona)
                VALUES (:nombre_establ, :zona)';

        $this->db->ejecutarQuery(
            $query,
            [
                $establecimiento->getNombreEstabl(),
                $establecimiento->getZona()
            ]
        );
    }

    public function listarEstablecimiento()
    {
        $query = 'SELECT * FROM establecimiento_comercial;';

        $this->db->ejecutarQuery($query);
    }
}