<?php

namespace Models\Establecimiento\Gateway;

use Library\DB;

class EstablecimientoGw
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }
}