<?php 

class categories extends Controller{

    public function index($nome = '')
    {
        $categorie = $this->model("CategorieDAO");
		$this->view('main/header');
		$this->view('categories/index', ['categorie'=>$categorie->findAll()]);
		$this->view('main/footer');
		
	}

    public function delete($id)
    {
        $categorie = $this->model("CategorieDAO");
        $messaggio = "non ha funzionato, riprova!";
        if ( $categorie->delete($id) ) 
        {
            $messaggio="categoria eliminata" ; 
            $this->index("test");
        }
        else echo "non eliminato";
    }


    public function viewPosts($id)
    {
        $categorie = $this->model("CategorieDAO");
        $this->view('main/header');
        $this->view('categories/viewCatPosts', ['categorie'=>$categorie->viewPosts($id)]);
        $this->view('main/footer');
    }   


    public function insert(){
        $categorie = $this->model("CategorieDAO");
        $messaggio = "crea nuovo cat";

        if(empty($_SESSION['email'])){
            $this->view('main/header');
            $this->view('users/login');
            $this->view('main/footer');
        }else{
            if(!empty($_SESSION['admin']) || !empty($_SESSION['redattore'])){
                if (isset($_POST['categoria'])){
                    $categoria = new categoria();
                    $categoria->categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_URL);
                    if ( $categorie->insert($categoria) ) $messaggio="categoria inserito" ; 
                    $this->index("test");
                }else{
                    $this->view('main/header');
                    $this->view('categories/put', ['messaggio'=>$messaggio]);
                    $this->view('main/footer');
                }
            }
            else{
                $messaggio = "Non hai le autorizzazioni necessarie per inserire una categoria.";
                
                $this->view('main/header');
                $this->view('categories/index', ['categorie'=>[], 'messaggio'=>$messaggio]);
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
