<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;

use Laminas\View\Model\ViewModel;
use Library\DB;
use Models\Establecimiento\Gateway\EstablecimientoGw;
use Models\Producto\Gateway\ProductoGw;
use Models\Producto\Model\Producto;
use Models\Registro\Gateway\RegistroGw;
use Models\Registro\Model\Registro;
use Models\TipoProducto\Gateway\TipoProductoGw;

class RegistroController extends AbstractActionController
{
    private $db;
    private $retorno = [
        'error' => false,
        'error_code' => 0,
        'mensaje' => '',
        'data' => ''
    ];

    private function jsonResponse($retorno)
    {
        $response = $this->getResponse();
        $response->setContent(json_encode($retorno));
        $response->getHeaders()->addHeaderLine('Content-Type', 'application/json');
        return $response;
    }

    public function __construct()
    {
        $this->db = new DB();
    }

    public function registroAction()
    {
        $tipoGw = new TipoProductoGw($this->db);
        $establGw = new EstablecimientoGw($this->db);

        $tipo = $tipoGw->listarTipo();
        $establ = $establGw->listarEstablecimiento();

        return [
            'tipos' => $tipo,
            'establs' => $establ
        ];
    }

    public function registroEnviarAction()
    {
        $datos = $this->params()->fromPost();

        $prodGw = new ProductoGw($this->db);
        $registroGw = new RegistroGw($this->db);

        // registro de todos los agregados
        $registros = [
            'productos' => $datos['producto'],
            'tipos' => $datos['tipo'],
            'precios' => $datos['precio'],
            'ofertas' => $datos['precioOferta'],
            'cantidades' => $datos['cantidad'],
            'establecimientos' => $datos['establecimiento'],
        ];

        for ($i = 0; $i < count($registros['productos']); $i++) {

            $tipo = ($registros['tipos'][$i] == "Seleciona tipo producto") ? 1 : $registros['tipos'][$i];
            $establ = ($registros['establecimientos'][$i] == "¿Donde lo compraste?") ? null : $registros['establecimientos'][$i];

            $prodGw->createProducto(
                new Producto(
                    null,
                    $registros['productos'][$i],
                    $tipo,
                    $registros['precios'][$i],
                    $registros['ofertas'][$i],
                )
            );

            $registroGw->createRegistro(
                new Registro(
                    null,
                    $prodGw->lastProducto()[0]->id,
                    $establ,
                    date('Y-m-d'),
                    $registros['cantidades'][$i],
                )
            );
        }


        $this->retorno['error'] = false;
        return $this->jsonResponse($this->retorno);
    }

    public function registroVerAction()
    {
        $registroGw = new RegistroGw($this->db);
        $tipoGw = new TipoProductoGw($this->db);
        $establGw = new EstablecimientoGw($this->db);

        $registros = $registroGw->listarRegistros();
        $tipos = $tipoGw->listarTipo();
        $establs = $establGw->listarEstablecimiento();

        return [
            'registros' => $registros,
            'tipos' => $tipos,
            'establs' => $establs
        ];
    }

    public function registroFiltroAction()
    {
        $dato = $this->params()->fromPost();

        $registroGw = new RegistroGw($this->db);

        // separa el atributo zona enviado
        $zona = explode('-', str_replace(' ', '', $dato['zona']));


        $wheres = [
            'tipo_prod' => $dato['tipo'],
            'nombre_establ' => $zona[1],
            'zona' => $zona[0],
            'nombre_prod' => $dato['producto'],
        ];

        $registroGw->listarRegistros($wheres);
    }
}
