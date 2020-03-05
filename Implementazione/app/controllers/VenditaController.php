<?php

require_once __DIR__ . "/../core/Controller.php";

class VenditaController extends Controller
{
	//TODO: DB
	public function consultaVoli($partenza, $destinazione, $data, $nPosti) {
	    var_dump($partenza . " " . $destinazione . " " . $data . " " . $nPosti);
		$registro = $this->model('volo/RegistroVoli');
		$voli = $registro->cercaVoli($partenza, $destinazione, $data, $nPosti);
		$this->view('vendita/consulta', json_encode($voli));
	}
	
	//TODO: DB e restituire voli anziché date
	public function cercaDateDisponibili($idVolo, $nPosti) {
		$registro = $this->model('RegistroVoli');
		$voli = $registro->cercaDateDisponibili($idVolo, $nPosti);
		$this->view('vendita/cambiaprenotazione', $voli);
	}
	
	//TODO: DB
	public function cambiaData($idPrenotazione, $idCliente, $idNuovoVolo, $nuovaTariffa, $metodoPagamento, $carta = "") {
		$registroPrenotazioni = $this->model('RegistroPrenotazioni');
		$registroClienti = $this->model('RegistroClienti');
		$registroVoli = $this->model('RegistroVoli');
		$cliente = $registroClienti->getCliente($idCliente);
		$prenotazione = $registroPrenotazioni->getPrenotazione($idPrenotazione);
		$volo = $prenotazione->getVolo();
		$nuovoVolo = $registroVoli->getVolo($idVolo);
		$esitoCambioData = $registroPrenotazioni->cambiaData($prenotazione, $cliente, $nuovoVolo, $nuovaTariffa, $metodoPagamento, $carta);
		if($esitoCambioData) {
			//Aggiornare prenotazione (anche biglietti e acquisto), cliente, volo vecchio e volo nuovo per i posti
			$registroPrenotazione->generaBiglietti($prenotazione, $cliente);
			$registroPrenotazioni->aggiornaPrenotazione($prenotazione);
			$registroClienti->aggiornaCliente($cliente);
			$registroVoli->aggiornaVolo($volo);
			$registroVoli->aggiornaVolo($nuovoVolo);
			//TODO: view con successo
		} else {
			//TODO: view con errore
		}
	}

	//TODO: DB
	public function acquistaPrenotazione($idPrenotazione, $idCliente, $metodoPagamento, $carta = "") {
		$registroPrenotazioni = $this->model('RegistroPrenotazioni');
		$registroClienti = $this->model('RegistroClienti');
		$cliente = $registroClienti->getCliente($idCliente);
		$prenotazione = $registroPrenotazioni->getPrenotazione($idPrenotazione);
		$esitoPagamento = $registroPrenotazioni->acquistaPrenotazione($prenotazione, $cliente, $metodoPagamento, $carta);
		if($esitoPagamento) {
			$registroPrenotazione->generaBiglietti($prenotazione, $cliente);
			$registroPrenotazioni->aggiornaPrenotazione($prenotazione);
			$registroClienti->aggiornaCliente($cliente);
			//TODO: view con successo
		} else {
			//TODO: view con errore
		}
	}
}