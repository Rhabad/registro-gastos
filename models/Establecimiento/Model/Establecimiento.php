<?php
namespace Models\Establecimiento\Model;

class Establecimiento
{
    private $idEstablCom;
    private $nombreEstabl;
    private $zona;

    public function __construct(int $idEstablCom = null, string $nombreEstabl = "", string $zona = "")
    {
        $this->idEstablCom = $idEstablCom;
        $this->nombreEstabl = $nombreEstabl;
        $this->zona = $zona;
    }

    /**
     * Get the value of idEstablCom
     */
    public function getIdEstablCom()
    {
        return $this->idEstablCom;
    }

    /**
     * Set the value of idEstablCom
     *
     * @return  self
     */
    public function setIdEstablCom($idEstablCom)
    {
        $this->idEstablCom = $idEstablCom;

        return $this;
    }

    /**
     * Get the value of nombreEstabl
     */
    public function getNombreEstabl()
    {
        return $this->nombreEstabl;
    }

    /**
     * Set the value of nombreEstabl
     *
     * @return  self
     */
    public function setNombreEstabl($nombreEstabl)
    {
        $this->nombreEstabl = $nombreEstabl;

        return $this;
    }

    /**
     * Get the value of zona
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set the value of zona
     *
     * @return  self
     */
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }
}