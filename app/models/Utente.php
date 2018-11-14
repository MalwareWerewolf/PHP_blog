<?php

class Utente {

    private $id;
    private $nome;
    private $cognome;
    private $email;
    private $password;
    private $ruolo;
    
    public function __construct() {

    }

    public function __get($nomeAttributo)
    {
        return $this->$nomeAttributo;
    }

    public function __set($nomeAttributo, $value)
    {
        if (isset($value)) $this->$nomeAttributo = $value;
    }


    public function __toString(){
        return $this->nome . ' ' . $this->cognome . ' ' . $this->email;
    }
}
