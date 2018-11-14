<?php


class Commento
{

    public $id;
    public $testoCom;
    public $email;
    public $titolo;
    public $dataCommento;
    public $id_commento;
    
    public function __construct()
    {

    }

    public function __get($nomeAttributo)
    {
        return $this->$nomeAttributo;
    }

    public function __set($nomeAttributo, $value)
    {
        if (isset($value)) $this->$nomeAttributo = $value;
    }



    public function __toString()
    {
        return $this->testoCom . '';
    }

}