<?php


//namespace model\servizi;

require_once("database/AcquistoDB.php");
require_once("database/AereoDB.php");
require_once("database/AeroportoDB.php");
require_once("database/BigliettoDB.php");
require_once("database/ClienteDB.php");
require_once("database/ImpiegatoDB.php");
require_once("database/IstitutoDB.php");
require_once("database/PagamentoConCartaDB.php");
require_once("database/PagamentoConPuntiDB.php");
require_once("database/PostoDB.php");
require_once("database/PrenotazioneDB.php");
require_once("database/PromozioneDB.php");
require_once("database/VoloDB.php");
//require_once("database/OIDDB.php");


class DBFacade{

    private static $instance = null;
    private $gestori = array();

    private function __construct(){
        // TODO: Factory mapper?
        $cli = new ClienteDB();
        $this->gestori['Cliente'] = $cli;
        $this->gestori['ClienteFedelta'] = $cli;
        $this->gestori['Acquisto'] = new AcquistoDB();
        $this->gestori['Aereo'] = new AereoDB();
        $this->gestori['Aeroporto'] = new AeroportoDB();
        $this->gestori['Biglietto'] = new BigliettoDB();
        $this->gestori['Impiegato'] = new ImpiegatoDB();
        $this->gestori['Istituto'] = new IstitutoDB();
        $this->gestori['PagamentoConPunti'] = new PagamentoConPuntiDB();
        $this->gestori['PagamentoConCarta'] = new PagamentoConCartaDB();
        $this->gestori['Posto'] = new PostoDB();
        $this->gestori['Prenotazione'] = new PrenotazioneDB();
        $this->gestori['Promozione'] = new PromozioneDB();
        $this->gestori['Volo'] = new VoloDB();
    }

    public static function getIstance(){
        if (!self::$instance) {
            self::$instance = new DBFacade();
        }
        return self::$instance;
    }

    //Operazioni CRUD

    public function update($object){
        $esito = $this -> gestori[$this->getClassName($object)] -> update($object);
    }

    public function put($object){
        $esito = $this -> gestori[$this->getClassName($object)] -> put($object);
        return $esito;
    }

    public function get($OID, $class){
        $returnObject = $this -> gestori[$class]->get($OID,$class);
        return $returnObject;
    }

    public function delete($OID, $class){
        $this->gestori[$class]->delete($OID,$class);
    }

    private function getClassName($class){
        return get_class($class);
        //return substr(strrchr(get_class($class), "\\"), 1);
    }

    public function getAll($class){
        return $this->gestori[$class]->getAll($class);
    }

    //Metodi Facade

    public function emailFedeltaExists($email){
        return $this->gestori['Cliente'] -> emailFedeltaExists($email);
    }

    public function cercaVoli($partenza, $destinazione, $data, $nPosti){
        return $this->gestori['Volo']->cercaVoli($partenza, $destinazione, $data, $nPosti);
    }

    public function getPrenotazioniScaduteIn($ore){
        return $this->gestori['Prenotazione'] -> getScadute($ore);
    }

    public function userLogin($email, $password){
        return $this->gestori['Cliente'] -> login($email, $password);
    }

    public function impiegatoLogin($username, $password){
        return $this->gestori['Impiegato'] -> login($username, $password);
    }

    public function getClientiFedelta(){
        return $this->gestori['Cliente'] -> getClientiFedelta();
    }

    public function checkPrenotazioneUnivoca($email,$OIDVolo){
        return $this->gestori['Prenotazione'] -> checkUnivoca($email, $OIDVolo);
    }

    public function getFedeltaUltimaPrenotazione(){
        return $this->gestori['Prenotazione'] -> getFedeltaUltimaPrenotazione();
    }

    public function getUltimoCodiceFedelta(){
        return $this->gestori['Cliente'] -> getUltimoCodiceFedelta();
    }

    public function getClientiVolo($OID){
        return null;
    }

}





