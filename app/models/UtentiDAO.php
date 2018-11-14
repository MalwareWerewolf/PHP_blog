<?php

require_once '../app/pdo/connessione.php';
require_once '../app/models/Utente.php';

class UtentiDAO extends Connessione
{

    public function findAll()
    {

        try {

            $query = "SELECT * FROM utenti ";

            $elencoUtenti = parent::getConnessione()->prepare($query);

            $elencoUtenti->execute();

            $elencoUtenti->setFetchMode(PDO::FETCH_CLASS, "Utente");

            $Utenti = array();

            while ($stente = $elencoUtenti->fetch()) {
                $Utenti[] = $stente;
            }
            return $Utenti;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function checkLogin($stente)
    {
        try {
            $stmt = parent::getConnessione()->prepare("SELECT * FROM utenti where email = :email AND password = :password");

            $email = $stente->email;
            $password = $stente->password;

            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);

            $stmt->execute();

            $data = $stmt->rowCount();

            if($data == 0){
                require_once '../app/controllers/home.php';
                echo 'utente non trovato';
                session_destroy();
                $returnHome = new home();
                $home = $returnHome->index();
            }

            else{
                require_once '../app/controllers/users.php';
                $users = new users();
                $usersHome = $users->index();
            }

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function findRole($email, $password)
    {
        try{

			$stmt = parent::getConnessione()->prepare('SELECT ruolo FROM utenti where email = :email AND password = :password');
			$stmt->execute(array(
                ':email' => $email,
                ':password' => $password
            ));
			$row = $stmt->fetch();

            $printPosts = $row['ruolo'];

            return $printPosts;	


		}catch(PDOException $e) {
			echo $e->getMessage();
		}
    }

    public function findUserID($email, $password)
    {
        try{

			$stmt = parent::getConnessione()->prepare('SELECT id FROM utenti where email = :email AND password = :password');
			$stmt->execute(array(
                ':email' => $email,
                ':password' => $password
            ));
			$row = $stmt->fetch();

			$printPosts = $row['id'];

			return $printPosts;	

		}catch(PDOException $e) {
			echo $e->getMessage();
		}
    }


    public function findOne($id)
    {
        try {

            $query = "SELECT * FROM utenti where id = :id ";

            $elencoUtenti = parent::getConnessione()->prepare($query);

            $elencoUtenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoUtenti->execute();

            $elencoUtenti->setFetchMode(PDO::FETCH_CLASS, "Utente");

            $Utenti = array();
            $Utenti[] = $elencoUtenti->fetch();

            return $Utenti;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {

        try {

            $query = "DELETE FROM utenti where id = :id ";

            $elencoUtenti = parent::getConnessione()->prepare($query);

            $elencoUtenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoUtenti->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function insert($stente)
    {
        try {
            $stmt = parent::getConnessione()->prepare("INSERT INTO Utenti (nome,cognome, email, password, ruolo) VALUES(:nome , :cognome, :email, :password, :ruolo)");

            $nome = $stente->nome;
            $cognome = $stente->cognome;
            $email = $stente->email;
            $password = $stente->password;
            $ruolo = $stente->ruolo;
            

            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":cognome", $cognome, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":ruolo", $ruolo, PDO::PARAM_STR);

            if ($stmt->execute()) {

                echo "Inserita la riga con id : " . parent::getConnessione()->lastInsertId();

            }

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    public function signup($stente)
    {
        try {
            $stmt = parent::getConnessione()->prepare("INSERT INTO Utenti (nome,cognome, email, password, ruolo) VALUES(:nome , :cognome, :email, :password, :ruolo)");

            $nome = $stente->nome;
            $cognome = $stente->cognome;
            $email = $stente->email;
            $password = $stente->password;
            $ruolo = "lettore";
            

            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":cognome", $cognome, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":ruolo", $ruolo, PDO::PARAM_STR);

            if ($stmt->execute()) {

            }

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
