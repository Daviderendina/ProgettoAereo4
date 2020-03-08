<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/models/servizi/OIDGenerator.php";

class Aeroporto{

    private $OID;
    private $nome;
    private $continente;
    private $nazione;
    private $citta;


    public function __construct($nome, $continente, $nazione, $citta)
    {
        $this->OID = OIDGenerator::getIstance()->getNewOID();
        $this->nome = $nome;
        $this->continente = $continente;
        $this->nazione = $nazione;
        $this->citta = $citta;
    }

    /**
     * @return string
     */
    public function getOID()
    {
        return $this->OID;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getContinente()
    {
        return $this->continente;
    }

    /**
     * @return mixed
     */
    public function getNazione()
    {
        return $this->nazione;
    }

    /**
     * @return mixed
     */
    public function getCitta()
    {
        return $this->citta;
    }

}
