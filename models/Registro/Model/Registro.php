<?php
namespace Models\Registro\Model;

class Registro
{
    private $idRegistro;
    private $prodId;
    private $establId;
    private $fechaCompra;
    private $cantidad;


    public function __construct(int $idRegistro = null, int $prodId, int $establId = null, string $fechaCompra, int $cantidad)
    {
        $this->idRegistro = $idRegistro;
        $this->prodId = $prodId;
        $this->establId = $establId;
        $this->fechaCompra = $fechaCompra;
        $this->cantidad = $cantidad;
    }

    /**
     * Get the value of idRegistro
     */
    public function getIdRegistro()
    {
        return $this->idRegistro;
    }

    /**
     * Set the value of idRegistro
     *
     * @return  self
     */
    public function setIdRegistro($idRegistro)
    {
        $this->idRegistro = $idRegistro;

        return $this;
    }

    /**
     * Get the value of prodId
     */
    public function getProdId()
    {
        return $this->prodId;
    }

    /**
     * Set the value of prodId
     *
     * @return  self
     */
    public function setProdId($prodId)
    {
        $this->prodId = $prodId;

        return $this;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of fechaCompra
     */
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    /**
     * Set the value of fechaCompra
     *
     * @return  self
     */
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;

        return $this;
    }

    /**
     * Get the value of establId
     */
    public function getEstablId()
    {
        return $this->establId;
    }

    /**
     * Set the value of establId
     *
     * @return  self
     */
    public function setEstablId($establId)
    {
        $this->establId = $establId;

        return $this;
    }
}