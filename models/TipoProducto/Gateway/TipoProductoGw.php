<?php
namespace Models\TipoProducto\Gateway;

use Library\DB;
use Models\TipoProducto\Model\TipoProducto;

class TipoProductoGw
{
    private $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function createTipo(TipoProducto $tipoProducto)
    {
        $query = 'INSERT INTO
        tipo_producto (tipo_prod, descripcion)
    VALUES (
            :tipo_prod,
            :descripcion
        )';

        $this->db->ejecutarQuery(
            $query,
            [
                $tipoProducto->getTipoProd(),
                $tipoProducto->getDescripcion()
            ]
        );
    }

    public function listarTipo()
    {
        $query = 'SELECT * FROM tipo_producto';

        return $this->db->ejecutarQuery($query);
    }
}