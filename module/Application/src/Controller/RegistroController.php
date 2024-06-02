<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;

use Laminas\View\Model\ViewModel;
use Library\DB;

class RegistroController extends AbstractActionController
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function registroAction()
    {
        return new ViewModel();
    }
}
