<?php
namespace Models\Producto\Gateway;

use Library\DB;

class ProductoGw
{
    private $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }


}