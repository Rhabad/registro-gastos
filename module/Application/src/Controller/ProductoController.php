<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Library\DB;

class ProductoController extends AbstractActionController
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }
}