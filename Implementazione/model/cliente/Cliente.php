<?php


namespace model\cliente;


class Cliente{
    private $nome;
    private $cognome;
    private $email;
    private $dataNascita;

    public __contruct($nome, $cognome, $email, $dataNascita){
        this->$nome = $nome;
        this->$cognome = $cognome;
        this->$email = $email;
        this->$dataNascita = $dataNascita;
    }
}

 ?>
