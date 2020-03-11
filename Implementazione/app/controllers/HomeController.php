<?php

require_once "../app/core/Controller.php";


class HomeController extends Controller {

    private $registroVoli;

    public function __construct()
    {
        $this->registroVoli = new RegistroVoli();
    }

    public function index() {
	    $aeroporti = $this->registroVoli->getAeroporti();
		$this->view('home/index', ["aeroporti" => $aeroporti]);
	}
	
}