<?php

require_once '../app/pdo/connessione.php';
require_once '../app/models/Commento.php';

class CommentiDAO extends Connessione
{

    public function findAll()
    {

        try {

            $query = "SELECT * FROM commenti c join r_post_utenti_commenti rpuc on c.id=rpuc.id_commento join post p on p.id=rpuc.id_post join utenti u on u.id = rpuc.id_utente ORDER BY c.dataCommento DESC";

            $elencoCommenti = parent::getConnessione()->prepare($query);

            $elencoCommenti->execute();

            $elencoCommenti->setFetchMode(PDO::FETCH_CLASS, "Commento");

            $commenti = array();

            while ($com = $elencoCommenti->fetch()) {
                $commenti[] = $com;
            }
            return $commenti;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findOne($id)
    {

        try {

            $query = "SELECT * FROM commenti where id = :id ";

            $elencoCommenti = parent::getConnessione()->prepare($query);

            $elencoCommenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoCommenti->execute();

            $elencoCommenti->setFetchMode(PDO::FETCH_CLASS, "Commento");

            $commenti = array();
            $commenti[] = $elencoCommenti->fetch();

            return $commenti;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {

        try {

            $query = "DELETE FROM commenti where id = :id ";

            $elencoCommenti = parent::getConnessione()->prepare($query);

            $elencoCommenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoCommenti->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function approvato($id)
    {
        try {

            $stmt = parent::getConnessione()->prepare("UPDATE commenti SET approvato = 'true' where id = :id ");

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {

            } else throw new Exception("Error Processing posr", 1);
                
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function deletePostComments($id)
    {

        try {

            $query = "DELETE FROM commenti c join r_post_utenti_commenti rpuc on c.id=rpuc.id_commento join post p on p.id=rpuc.id_post join utenti u on u.id = rpuc.id_utente WHERE p.id = :id";

            $elencoCommenti = parent::getConnessione()->prepare($query);

            $elencoCommenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoCommenti->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function viewPosts($id){

        try {

            $query = "SELECT * FROM post p join r_post_categorie rpc on p.id=rpc.id_post join categorie c on c.id=rpc.id_categoria WHERE c.id = :id";

            $elencoCategorie = parent::getConnessione()->prepare($query);

            $elencoCategorie->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoCategorie->execute();

            $elencoCategorie->setFetchMode(PDO::FETCH_CLASS, "Categoria");

            $categorie = array();

            while ($cat = $elencoCategorie->fetch()) {
                $categorie[] = $cat;
            }
            return $categorie;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert($commento, $id_post)
    {
        if(!empty($_SESSION['email'])){
            try {
                $query = "INSERT INTO commenti (testoCom, approvato, dataCommento) VALUES(:testo, :approvato, :dataCommento)"; 

                $stmt = parent::getConnessione()->prepare($query);

                $testo = nl2br($commento->testo);
                $data = date('Y-m-d h:i:sa');
                $approvato = 'false';

                $stmt->bindParam(":testo", $testo, PDO::PARAM_STR);
                $stmt->bindParam(":dataCommento", $data, PDO::PARAM_STR);
                $stmt->bindParam(":approvato", $approvato, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $id_commento = parent::getConnessione()->lastInsertId();
                    $stmt2 = parent::getConnessione()->prepare("INSERT INTO r_post_utenti_commenti (id_post,id_commento,id_utente) VALUES(:id_post , :id_commento, :id_utente)");
                    $stmt2->bindParam(":id_post", $id_post , PDO::PARAM_INT);
                    $stmt2->bindParam(":id_commento", $id_commento, PDO::PARAM_INT);
                    $stmt2->bindParam(":id_utente", $_SESSION['id_author'], PDO::PARAM_INT);
                    if ($stmt2->execute()) {
                        
                    } else throw new Exception("Error Processing relazione", 1);
                } else throw new Exception("Error Processing posr", 1);

            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        else{
            
            $this->view('main/header');
            $this->view('users/login');
            $this->view('main/footer');
        }
    }
}
