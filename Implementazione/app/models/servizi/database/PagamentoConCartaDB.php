<?php


require_once("AbstractDB.php");


class PagamentoConCartaDB extends AbstractDB{

    public function generatePutQuery($obj){
        $query = "INSERT INTO PagamentoConCarta VALUES ('%s',%d,'%s','%s')";
        return sprintf($query, $obj->getOID(), $obj->getImporto(), $obj->getData(), $obj->getIstituto()->getOID());
    }

}