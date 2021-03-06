<?php


require_once "../app/models/servizi/OIDGenerator.php";


abstract class Pagamento{
	
    protected $OID;
    protected $data;
    protected $importo;

    public function __construct($importo)
    {
        $this->importo = $importo;
        $this->OID = OIDGenerator::getIstance()->getNewOID();
        $this->data = date("yy-m-d");
    }

    public function getOID()
    {
        return $this->OID;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getImporto()
    {
        return $this->importo;
    }

    public abstract function effettua($parametro);

	
} 
