<?php
namespace Models\Registro\Gateway;

use Library\DB;
use Models\Registro\Model\Registro;

class RegistroGw
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function createRegistro(Registro $registro)
    {
        $query = 'INSERT INTO
        registro (
            prod_id,
            establ_id,
            fecha_compra,
            cantidad
            )
        VALUES (:prod_id, :establ_id, :fecha_compra, :cantidad)';

        $this->db->ejecutarQuery(
            $query,
            [
                $registro->getProdId(),
                $registro->getEstablId(),
                $registro->getFechaCompra(),
                $registro->getCantidad()
            ]
        );
    }
}