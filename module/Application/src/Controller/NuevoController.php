<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;

class NuevoController extends AbstractActionController
{
    public function productosAction()
    {
        $productos = [
            ["asd", "qwe", 12],
            ["asd", "qwe", 13],
            ["asd", "qwe", 11]
        ];

        return [
            "productos" => $productos,
        ];
    }
}