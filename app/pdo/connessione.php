<?php

class Connessione 
{

    private $connessione=null;

    public function __construct(){
        
        $this->connetti();
    }
    
    public function connetti()
    {
        
        try {
            
            $this->connessione = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $eccezione) {
            echo $eccezione->getMessage();
        } 
        // finally {
        //     echo 'finally: questo codice viene eseguito in ogni caso';
        // }
        
        //echo 'sei connesso';

    }
    
    public function getConnessione()
    {
        return $this->connessione;
        # code...
    }

    public function closeConnessione()
    {
        if ($this->connessione === null)
        $this->connessione->close();
        # code...
    }

}

