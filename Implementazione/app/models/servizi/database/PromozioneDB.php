<?php


//namespace model\servizi;
require_once("AbstractDB.php");


class PromozioneDB extends AbstractDB{

    //Da rivedere fabio
    //percentuale
    protected function generatePutQuery($obj){
        $var = sprintf("INSERT INTO Promozione VALUES ('%s', '%s', '%s', '%s', %u, %u)", $obj->getOID(), $obj->getDataInizio(), $obj->getDataFine(), $obj->getNome(), (int)$obj->isFedelta(), (int)$obj->getSconto());
        return $var;
    }
}