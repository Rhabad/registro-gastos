<?php
namespace Models\Producto\Gateway;

use Library\DB;
use Models\Producto\Model\Producto;

class ProductoGw
{
    private $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function createProducto(Producto $producto)
    {
        $query = 'INSERT INTO
        producto (
            nombre_prod,
            tipo_prod,
            precio,
            precio_oferta
        )
    VALUES (
            :nombre_prod,
            :tipo_prod,
            :precio,
            :precio_oferta
        )';

        $this->db->ejecutarQuery(
            $query,
            [
                $producto->getNombreProd(),
                $producto->getTipoProd(),
                $producto->getPrecio(),
                $producto->getPrecioOferta()
            ]
        );
    }
}