<?php 

class commenti extends Controller{

    public function index($nome = '')
    {
        $commenti = $this->model("CommentiDAO");
        if(empty($_SESSION['admin'])){
            $messaggio = "Non hai le autorizzazioni per visualizzare i commenti.";
            $this->view('main/header');
            $this->view('commenti/index', ['commenti'=>[],'messaggio'=>$messaggio]);
            $this->view('main/footer');
        }
        else{
            $this->view('main/header');
            $this->view('commenti/index', ['commenti'=>$commenti->findAll()]);
            $this->view('main/footer');
        }
	}

    public function delete($id, $id_post)
    {
        $commenti = $this->model("CommentiDAO");
        $messaggio = "non ha funzionato, riprova!";

        if ( $commenti->delete($id) ) 
        {
            require_once '../app/controllers/posts.php';

            $myVista = new posts;
            $myVistaObj = $myVista->vista($id_post);
        }
        else echo "non eliminato";
    }

    public function deleteFromList($id)
    {
        $commenti = $this->model("CommentiDAO");
        $messaggio = "non ha funzionato, riprova!";

        if ( $commenti->delete($id) ) 
        {
            $this->index("test");
        }
        else echo "non eliminato";
    }

    public function approvato($id)
    {
        $commenti = $this->model("CommentiDAO");

        if ( $commenti->approvato($id) ) 
        {

        }
        $messaggio = "Commento approvato";
                
        $this->view('main/header');
        $this->view('commenti/index', ['commenti'=>[], 'messaggio'=>$messaggio]);
        $this->view('main/footer');
    }

    
    public function insert($id_post){
        $commenti = $this->model("CommentiDAO");
        $messaggio = "crea nuovo commento";

        if(empty($_SESSION['email'])){
            $this->view('main/header');
            $this->view('users/login');
            $this->view('main/footer');
        }else{
            if (isset($_POST['testo'])){
                $commento = new commento();
                $commento->testo = $_POST['testo'];
                if ( $commenti->insert($commento, $id_post) ) $messaggio="commento inserito" ; 

                $messaggio = "Il commento è in attesa di revisione.";

                $this->view('main/header');
                $this->view('commenti/index', ['commenti'=>[], 'messaggio'=>$messaggio]);
                $this->view('main/footer');

            }else{
                $this->view('main/header');
                $this->view('users/login');
                $this->view('main/footer');
            }
        }
    }
    

    public function json($id=1)
    {
        $categorie = $this->model("CategorieDAO");
        $data = $categorie->findOne($id);
        header('Content-Type: application/json');
        echo json_encode($data[0]->nome);
    }
}
