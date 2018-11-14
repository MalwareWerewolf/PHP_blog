<?php

require_once '../app/pdo/connessione.php';
require_once '../app/models/Categoria.php';

class CategorieDAO extends Connessione
{


    public function findAll()
    {
        try {

            $query = "SELECT * FROM categorie ";

            $elencoCategorie = parent::getConnessione()->prepare($query);

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

    public function findOne($id)
    {

        try {

            $query = "SELECT * FROM categorie where id = :id ";

            $elencoCategorie = parent::getConnessione()->prepare($query);

            $elencoCategorie->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoCategorie->execute();

            $elencoCategorie->setFetchMode(PDO::FETCH_CLASS, "Categoria");

            $categorie = array();
            $categorie[] = $elencoCategorie->fetch();

            return $categorie;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {

        try {

            $query = "DELETE FROM categorie where id = :id ";

            $elencoCategorie = parent::getConnessione()->prepare($query);

            $elencoCategorie->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoCategorie->execute();

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
    
    public function insert($cat)
    {
        try {
            $stmt = parent::getConnessione()->prepare("INSERT INTO categorie (categoria) VALUES(:categoria)");

            $categoria = $cat->categoria;
            

            $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "Inserita la riga con id : " . parent::getConnessione()->lastInsertId();
            }

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
