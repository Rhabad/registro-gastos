<?php
namespace Models\Detalle\Gateway;

use Library\DB;

class DetalleGw
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }
}