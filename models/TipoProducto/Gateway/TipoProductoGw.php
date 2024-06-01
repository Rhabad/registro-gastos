<?php
namespace Models\TipoProducto\Gateway;

use Library\DB;

class TipoProductoGw
{
    private $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }
}