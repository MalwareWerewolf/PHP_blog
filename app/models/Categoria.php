<?php


class Categoria
{

    private $id;
    private $categoria;
    
    public function __construct()
    {

    }

    //metodi getter e setter generici
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
        return $this->categoria . '';
    }

}