<?php

require_once '../app/pdo/connessione.php';
require_once '../app/models/Post.php';

class PostDAO extends Connessione
{

    public function findAll()
    {

        try {

            $query = "SELECT * FROM post ORDER BY data DESC";

            $elencoPost = parent::getConnessione()->prepare($query);

            $elencoPost->execute();

            $elencoPost->setFetchMode(PDO::FETCH_CLASS, "Post");

            $Post = array();

            while ($post = $elencoPost->fetch()) {
                $Post[] = $post;
            }
            return $Post;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findOne($id)
    {

        try {

            $query = "SELECT * FROM post where id = :id ";

            $elencoPost = parent::getConnessione()->prepare($query);

            $elencoPost->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoPost->execute();

            $elencoPost->setFetchMode(PDO::FETCH_CLASS, "Post");

            $Post = array();
            $Post[] = $elencoPost->fetch();

            return $Post;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {

        try {

            $query = "DELETE FROM post where id = :id ";

            $elencoPost = parent::getConnessione()->prepare($query);

            $elencoPost->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoPost->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    
    public function findComByPostID($id)
    {
        try {

            $query = "SELECT * FROM commenti c join r_post_utenti_commenti rpuc on c.id=rpuc.id_commento join post p on p.id=rpuc.id_post join utenti u on u.id = rpuc.id_utente WHERE p.id = :id AND approvato = 'true' ORDER BY c.dataCommento DESC ";
            $query2 = "SELECT * FROM post where id = :id ";

            $elencoPost = parent::getConnessione()->prepare($query);
            $elencoPost->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoPost->execute();

            $elencoPost2 = parent::getConnessione()->prepare($query2);
            $elencoPost2->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoPost2->execute();

            $post2 = $elencoPost2->fetch();

            echo '<h1>'.$post2['titolo'].'</h1>'.'<h2>'.$post2['sottotitolo'].'</h2><p>'.$post2['testo'].'</p>';

            while ($post = $elencoPost->fetch()) {
                echo '<h3>'.$post['email'].' - '.$post['ruolo'].'</h3><p>'.$post['testoCom'].'</p>';

                if(!empty($_SESSION['email'])){
                    if($post['email'] == $_SESSION['email']){
                        echo '<p><a href="?url=commenti/delete/ '.$post['id_commento'].'/'.$post['id_post'].'"class="btn btn-danger">elimina</a></p>'.'<br>';
                    }
                }
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function update($id, $post){
        try {

            $stmt = parent::getConnessione()->prepare("UPDATE post SET titolo = :titolo, sottotitolo = :sottotitolo, testo = :testo, data = :data where id = :id ");

            $titolo = $post->titolo;
            $sottotitolo = $post->sottotitolo;
            $testo = nl2br($post->testo);
            $data = $post->data;

            $stmt->bindParam(":titolo", $titolo, PDO::PARAM_STR);
            $stmt->bindParam(":sottotitolo", $sottotitolo, PDO::PARAM_STR);
            $stmt->bindParam(":testo", $testo, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->bindParam(":data", $data, PDO::PARAM_STR);

            if ($stmt->execute()) {

            } else throw new Exception("Error Processing posr", 1);
                
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function insert($post)
    {

        if(!empty($_SESSION['admin']) || !empty($_SESSION['redattore'])){
            try {
                $stmt = parent::getConnessione()->prepare("INSERT INTO post (titolo,sottotitolo, testo, id_autore, data) VALUES(:titolo , :sottotitolo, :testo, :id_autore, :data)");

                $titolo = $post->titolo;
                $sottotitolo = $post->sottotitolo;
                $testo = nl2br($post->testo);
                $id_autore = $post->id_autore;
                $data = $post->data;   

                $stmt->bindParam(":titolo", $titolo, PDO::PARAM_STR);
                $stmt->bindParam(":sottotitolo", $sottotitolo, PDO::PARAM_STR);
                $stmt->bindParam(":testo", $testo, PDO::PARAM_STR);
                $stmt->bindParam(":id_autore", $id_autore, PDO::PARAM_STR);
                $stmt->bindParam(":data", $data, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $id_post = parent::getConnessione()->lastInsertId();
                    $stmt2 = parent::getConnessione()->prepare("INSERT INTO r_post_categorie (id_post,id_categoria) VALUES(:id_post , :id_categoria)");
                    $stmt2->bindParam(":id_post", $id_post , PDO::PARAM_INT);
                    $stmt2->bindParam(":id_categoria", $post->id_categoria, PDO::PARAM_INT);
                    if ($stmt2->execute()) {
                        echo "Inserito il post id : " . $id_post;
                    } else throw new Exception("Error Processing relazione", 1);
                } else throw new Exception("Error Processing posr", 1);

            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        else{
            $messaggio = "Non hai le autorizzazioni necessarie per creare un post.";
            
            $this->view('main/header');
            $this->view('posts/index', ['post'=>[], 'messaggio'=>$messaggio]);
            $this->view('main/footer');
        }
    }
}
