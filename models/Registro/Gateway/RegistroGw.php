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

    public function listarRegistros(array $wheres = [])
    {

        // realizar los filtros, o sea... procesar el array para pasarlo a where en la consulta
        $whereStr = "";

        if (count($wheres) > 0) {
            $whereStr = 'WHERE';

            foreach ($wheres as $key => $where) {
                $whereStr = ' ' . $key . ' = :' . $where . ' AND ';
            }
        }

        $lastAnd = strrpos($whereStr, 'AND');

        $whereStrFiltro = '';
        if ($lastAnd !== false) {
            if (substr($whereStr, $lastAnd) === 'AND') {
                $whereStrFiltro = substr($whereStr, 0, $lastAnd);
            }
        } else {
            $whereStrFiltro = $whereStr;
        }


        $query = 'SELECT
        r.id_registro as id,
        p.nombre_prod as producto,
        tp.tipo_prod as tipo,
        p.precio,
        p.precio_oferta as oferta,
        r.cantidad,
        r.fecha_compra as fecha_registro,
        ec.zona || " - " ||  ec.nombre_establ as zona
    FROM
        registro r
        LEFT JOIN producto p ON r.prod_id = p.id_producto
        LEFT JOIN tipo_producto tp ON p.tipo_prod_id = tp.id_tipo_prod
        LEFT JOIN establecimiento_comercial ec ON r.establ_id = ec.id_establ_com '
            . $whereStrFiltro;

        return $this->db->ejecutarQuery($query, $wheres);
    }
}