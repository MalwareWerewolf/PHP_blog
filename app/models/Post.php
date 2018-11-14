<?php


class Post {

    private $id;
    public $titolo;
    public $sottotitolo;
    public $testo;
    public $data;
    private $id_autore;

    
    //costruttore
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

    public function getAutore()
    {
        require_once '../app/models/UtentiDAO.php';
        $utente = new UtentiDAO;
        return $utente->findOne($this->id_autore);
    }

    public function getJSON()
    {
        return Json::encode($this);
    }

    public function __toString()
    {
        return '<h1>'.$this->titolo . '</h1><h2>' . $this->sottotitolo . '</h2>'.'<h3>'.$this->data.'</h3>'.'<p>'. implode($this->getAutore()) .'</p>';
    }

}