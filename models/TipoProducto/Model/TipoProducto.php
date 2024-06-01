<?php
namespace Models\TipoProducto\Model;

class TipoProducto
{
    private $idTipoProd;
    private $tipoProd;
    private $descripcion;

    public function __construct(int $idTipoProd = null, string $tipoProd, string $descripcion)
    {
        $this->idTipoProd = $idTipoProd;
        $this->tipoProd = $tipoProd;
        $this->descripcion = $descripcion;
    }

    /**
     * Get the value of idTipoProd
     */
    public function getIdTipoProd()
    {
        return $this->idTipoProd;
    }

    /**
     * Set the value of idTipoProd
     *
     * @return  self
     */
    public function setIdTipoProd($idTipoProd)
    {
        $this->idTipoProd = $idTipoProd;

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
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}