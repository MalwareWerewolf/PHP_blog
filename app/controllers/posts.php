<?php 

require_once '../app/models/CommentiDAO.php';

class posts extends Controller{
	
	public function index($titolo = '')
	{
        $post = $this->model("PostDAO");	
		$this->view('main/header');
		$this->view('posts/index', ['posts'=>$post->findAll()]);
		$this->view('main/footer');
		
	}
	
    public function vista($id)
    {
        $post = $this->model("PostDAO");
        $this->view('main/header');
        $this->view('posts/view', ['posts'=>$post->findComByPostID($id), 'posts'=>$post->findOne($id)]);
        $this->view('main/footer');
    }

    public function delete($id)
    {
        $post = $this->model("PostDAO");
        $commento = $this->model("CommentiDAO");
        $messaggio = "non ha funzionato, riprova!";

        if ( $post->delete($id) && $commento->deletePostComments($id)) $messaggio="post eliminato" ; 
        $this->view('main/header');
        $this->view('posts/index', ['posts'=>[], 'messaggio'=>$messaggio]);
        $this->view('main/footer');
    }

    public function insert()
    {
        if(!empty($_SESSION['lettore'])){
            $messaggio = "Non hai i permessi per creare un post";
            $this->view('main/header');
            $this->view('posts/index', ['posts'=>[], 'messaggio'=>$messaggio]);
            $this->view('main/footer');
        }else{
            $posts = $this->model("PostDAO");
			$utenti = $this->model("UtentiDAO");
			$categorie = $this->model("CategorieDAO");
			$messaggio = "crea nuovo post";
			if (isset($_POST['titolo']) && isset($_POST['sottotitolo'])){
				$post = new post();
				$post->titolo = $_POST['titolo'];
				$post->sottotitolo = $_POST['sottotitolo'];
				$post->testo = $_POST['testo'];
				$post->data = date('Y-m-d h:i:sa');
				$post->id_categoria = filter_var($_POST['id_categoria'], FILTER_SANITIZE_URL);
				$post->id_autore = filter_var($_POST['id_autore'], FILTER_SANITIZE_URL);
				if ( $posts->insert($post) ) $messaggio="post inserito" ; 
				$this->index("test");
			}
			else 
			{
				$this->view('main/header');
				$this->view('posts/put', ['messaggio'=>$messaggio, 'utenti' => $utenti->findAll(), 'categorie' => $categorie->findAll()]);
				$this->view('main/footer');
			}
        }
    }

    public function update($id)
    {
        if(empty($_SESSION['email'])){
            $this->view('main/header');
            $this->view('users/login');
            $this->view('main/footer');
        }else{
            $posts = $this->model("PostDAO");
			$messaggio = "modifica post";
			if (isset($_POST['titolo']) && isset($_POST['sottotitolo']) && isset($_POST['testo'])){
				$post = new post();
				$post->titolo = $_POST['titolo'];
				$post->sottotitolo = $_POST['sottotitolo'];
				$post->testo = $_POST['testo'];
				$post->data = date('Y-m-d h:i:sa');
				if ( $posts->update($id, $post) ) $messaggio="post inserito" ;     
				$this->vista($id);
			}
			else 
			{
				$this->view('main/header');
				$this->view('posts/update', ['messaggio'=>$messaggio,'posts' => $posts -> findOne($id)]);
				$this->view('main/footer');
            }
        }
    } 


    public function json($id=1){
        $post = $this->model("PostDAO");
        $data = $post->findAll();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
