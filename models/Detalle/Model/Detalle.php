<?php
namespace Models\Detalle\Model;

class Detalle
{
    private $idDetalle;
    private $anioMes;
    private $periodoGastoMes; // primer gasto del mes al ultimo.. creo que hare otra tabla
    private $totalGastoMes;


    public function __construct(int $idDetalle = null, string $anioMes = "", string $periodoGastoMes = "", float $totalGastoMes = 0)
    {
        $this->idDetalle = $idDetalle;
        $this->anioMes = $anioMes;
        $this->periodoGastoMes = $periodoGastoMes;
        $this->totalGastoMes = $totalGastoMes;
    }

    /**
     * Get the value of periodoGastoMes
     */
    public function getPeriodoGastoMes()
    {
        return $this->periodoGastoMes;
    }

    /**
     * Set the value of periodoGastoMes
     *
     * @return  self
     */
    public function setPeriodoGastoMes($periodoGastoMes)
    {
        $this->periodoGastoMes = $periodoGastoMes;

        return $this;
    }

    /**
     * Get the value of TotalGastoMes
     */
    public function getTotalGastoMes()
    {
        return $this->totalGastoMes;
    }

    /**
     * Set the value of TotalGastoMes
     *
     * @return  self
     */
    public function setTotalGastoMes($totalGastoMes)
    {
        $this->totalGastoMes = $totalGastoMes;

        return $this;
    }

    /**
     * Get the value of AnioMes
     */
    public function getAnioMes()
    {
        return $this->anioMes;
    }

    /**
     * Set the value of AnioMes
     *
     * @return  self
     */
    public function setAnioMes($AnioMes)
    {
        $this->anioMes = $AnioMes;

        return $this;
    }

    /**
     * Get the value of idDetalle
     */
    public function getIdDetalle()
    {
        return $this->idDetalle;
    }

    /**
     * Set the value of idDetalle
     *
     * @return  self
     */
    public function setIdDetalle($idDetalle)
    {
        $this->idDetalle = $idDetalle;

        return $this;
    }
}