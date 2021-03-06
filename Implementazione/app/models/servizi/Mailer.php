<?php

class Mailer{

    public function inviaCancellazioneFedelta($cliente){
        $message = "Gentile cliente, \n
                    Ti scriviamo per informarti che sei stato cancellato dal programma fedeltà. \n
                    Speriamo di riaverti presto con noi. \n 
                    Buona giornata \n \n
                    GrupopAereo4
                    " ;
        mail($cliente->getEmail(), "Cancellazione programma fedelta'", $message);
    }

    public function inviaEmailModificaVolo($listaClienti, $volo){

        $recipients = $this->generateRecipients($listaClienti);
        $message = "Gentile cliente, \n
                    Ti informiamo che il tuo volo è stato modificato. \n
                    Riportiamo di seguito le nuove informazioni aggiornate:\n
                    Partenza: %s    %s\n
                    Arrivo:   %s    %s\n
                    Ci scusiamo per il disguido,
                    Buona giornata\n\n
                    GruppoAereo4";

        $message = sprintf($message, $volo->getaeroportoPartenza()->getNome(), $volo->getDataOraPartenza(), $volo->getaeroportoDestinazione()->getNome(), $volo -> getDataOraArrivo());

        mail($recipients , "Avviso modifica volo",$message);
    }

    public function inviaEmailCancellazioneVolo($listaClienti, $volo){

        $recipients = $this->generateRecipients($listaClienti);
        $message = "Gentile cliente, \n
                    Ti informiamo che il tuo volo \n
                    Partenza: %s    %s \n
                    Arrivo:   %s    %s \n
                    E' stato cancellato. \n
                    Ci scusiamo per il disguido,
                    Buona giornata\n\n
                    GruppoAereo4";

        $message = sprintf($message, $volo->getAeroportoPartenza()->getNome(), $volo->getDataOraPartenza(), $volo->getaeroportoDestinazione()->getNome(), $volo -> getDataOraArrivo());
        mail($recipients , "Avviso cancellazione volo",$message);
    }

    public function inviaEmailCodiceFedelta($email, $codiceFedelta){
        $message = "Gentile cliente, \n
                    Grazie per esserti iscritto al nostro programma fedeltà!\n
                    Il tuo codice è: $codiceFedelta \n
                    Utilizzalo per acquistare ed accumulare punti.\n
                    Buona giornata\n\n
                    GruppoAereo4
                    ";

        mail($email, 'Conferma iscrizione programma fedeltà', $message);
    }

    public function inviaEmailBiglietti($email, $pdf){
        $content = file_get_contents($pdf);
        $content = chunk_split(base64_encode($content));
        $uid = md5(uniqid(time()));

        $header = "From: Gruppo Aereo 4 <gruppoaereo4@gmail.com>\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

        $plainMessage = "Gentile cliente, \n".
                    "In allegato trovi i biglietti da te acquistati.\n".
                    "Buona giornata\n\n".
                    "GruppoAereo4";

        $message = "--".$uid."\r\n";
        $message .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $message .= $plainMessage."\r\n\r\n";
        $message .= "--".$uid."\r\n";
        $message .= "Content-Type: application/octet-stream; name=\"".$pdf."\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n";
        $message .= "Content-Disposition: attachment; filename=\"".$pdf."\"\r\n\r\n";
        $message .= $content."\r\n\r\n";
        $message .= "--".$uid."--";

        mail($email, 'Biglietti acquistati', $message, $header);
    }

    public function inviaComunicazioneInfedelta($cliente){
        $message = "Gentile cliente, \n
                    Ti contattiamo per comunicarti che, a causa di mancati acquisti da due anni a questa parte, il tuo nuovo stato è di cliente infedele. \n
                    Per tornare ad essere un cliente fedeltà devi solamente effettuare un acquisto entro un anno, altrimenti verrai automaticamente cancellato dal programma. \n
                    Grazie, \n
                    Buona giornata \n\n
                    GruppoAereo4";
        mail($cliente->getEmail(), 'Avviso infedeltà', $message);
    }

    public function avvisaClientiPromozioni($listaClienti, $listaPromozioni){
        //Genero testo dalla lista promozioni
        $num = (count($listaPromozioni) >= 5) ? 5 : count($listaPromozioni);
        $message = "Gentile cliente, \n
                    Ti informiamo di alcune delle promozioni attualmente attive, esclusive per i cliente fedelta: \n";
        for($i = 0; $i<$num; $i++){
            $message .= sprintf("$i) %s", $listaPromozioni[$i]->getNome()." ".$listaPromozioni[$i]->getSconto())."% di sconto sul prezzo del biglietto \n";
        }
        $message .= "Grazie dell'attenzione, \n
                    Buona giornata \n \n
                    GruppoAereo4";
        mail($this->generateRecipients($listaClienti), 'Scopri le nuove promozioni', $message);
    }

    public function avvisaPrenotazioneInScadenza($listaClienti){
        $message = "Gentile cliente, \n
                    Ti avvisiamo che la tua prenotazione è in scadenza. \n
                    Se non verra acquistata entro 24 ore, verrà automaticamente eliminata. \n
                    Buona giornata \n\n
                    GruppoAereo4";
        mail($this->generateRecipients($listaClienti), "Prenotazione cancellata", $message);
    }

    public function inviaInformazioniPrenotazione($email,$OIDPrenotazione){
        $message = "Gentile cliente, \n
                    la tua prenotazione è andata a buon fine! \n
                    Con il link seguente potrai gestirla in tutta comodità: \n
                    https://gruppoaereo4.000webhostapp.com/public/prenotazione/gestionePrenotazione/".$OIDPrenotazione.". \n
                    Buona giornata \n\n
                    GruppoAereo4";
        mail($email, "Prenotazione confermata", $message);
    }

    private function generateRecipients($listaClienti)
    {
        $recipients = array();
        if ($listaClienti) {
            foreach ($listaClienti as $cliente) {
                array_push($recipients, $cliente->getEmail());
            }
            return implode(',', $recipients);
        }
        return '';
    }
}


