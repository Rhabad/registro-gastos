<?php
namespace Models\Producto\Model;

class Producto
{
    private $idProducto;
    private $nombreProd;
    private $tipoProd;
    private $precio;
    private $precioOferta;


    public function __construct(int $idProducto = null, string $nombreProd, string $tipoProd, int $precio, int $precioOferta)
    {
        $this->idProducto = $idProducto;
        $this->nombreProd = $nombreProd;
        $this->tipoProd = $tipoProd;
        $this->precio = $precio;
        $this->precioOferta = $precioOferta;
    }


    /**
     * Get the value of precioOferta
     */
    public function getPrecioOferta()
    {
        return $this->precioOferta;
    }

    /**
     * Set the value of precioOferta
     *
     * @return  self
     */
    public function setPrecioOferta($precioOferta)
    {
        $this->precioOferta = $precioOferta;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of tipoProd
     */
    public function getTipoProd()
    {
        return $this->tipoProd;
    }

    /**
     * Set the value of tipoProd
     *
     * @return  self
     */
    public function setTipoProd($tipoProd)
    {
        $this->tipoProd = $tipoProd;

        return $this;
    }

    /**
     * Get the value of nombreProd
     */
    public function getNombreProd()
    {
        return $this->nombreProd;
    }

    /**
     * Set the value of nombreProd
     *
     * @return  self
     */
    public function setNombreProd($nombreProd)
    {
        $this->nombreProd = $nombreProd;

        return $this;
    }

    /**
     * Get the value of idProducto
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set the value of idProducto
     *
     * @return  self
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }
}