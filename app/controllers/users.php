<?php 

class users extends Controller{
	
    public function index($nome = '')
    {
        $utenti = $this->model("UtentiDAO");

        if(empty($_SESSION['email'])){
            $this->view('main/header');
            $this->view('users/login');
            $this->view('main/footer');
        }else{     
            $this->view('main/header');
            $this->view('users/index', ['utenti'=>$utenti->findAll()]);
            $this->view('main/footer');
        }
		
	}

    public function vista($id = 1)
    {
        $utenti = $this->model("UtentiDAO");
        $this->view('main/header');
        $this->view('users/view', ['utenti'=>$utenti->findOne($id)]);
        $this->view('main/footer');
    }

    public function delete($id)
    {
        $utenti = $this->model("UtentiDAO");
        if ( $utenti->delete($id) ){
            $this->index("test");
        }
    }

    public function insert()
    {

        if(!empty($_SESSION['admin'])){
            $utenti = $this->model("UtentiDAO");
            $messaggio = "crea nuovo utente";

            if (isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['ruolo'])){
                $utente = new utente();
                $utente->nome = filter_var($_POST['nome'], FILTER_SANITIZE_URL);
                $utente->cognome = filter_var($_POST['cognome'], FILTER_SANITIZE_URL);
                $utente->email = filter_var($_POST['email'], FILTER_SANITIZE_URL);
                $utente->password = filter_var($_POST['password'], FILTER_SANITIZE_URL);
                $utente->ruolo = filter_var($_POST['ruolo'], FILTER_SANITIZE_URL);

                if ( $utenti->insert($utente) ) $messaggio="utente inserito" ; 

            }
            $this->view('main/header');
            $this->view('users/put', ['messaggio'=>$messaggio]);
            $this->view('main/footer');
        }
        else{
            $messaggio = "Non hai le autorizzazioni necessarie per creare un utente.";
            
            $this->view('main/header');
            $this->view('users/index', ['utenti'=>[], 'messaggio'=>$messaggio]);
            $this->view('main/footer');
        }

    }

    public function signup()
    {

        $utenti = $this->model("UtentiDAO");
        $messaggio = "Registrazione completata, effettua il login per continuare";

        if(empty($_SESSION['email'])){

            if (isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['email']) && isset($_POST['password'])){
                $utente = new utente();
                $utente->nome = filter_var($_POST['nome'], FILTER_SANITIZE_URL);
                $utente->cognome = filter_var($_POST['cognome'], FILTER_SANITIZE_URL);
                $utente->email = filter_var($_POST['email'], FILTER_SANITIZE_URL);
                $utente->password = filter_var($_POST['password'], FILTER_SANITIZE_URL);

                if ( $utenti->signup($utente) ) $messaggio;
                $messaggio = "Registrazione completata, <a href='?url=users/login'>login</a>";
                
                $this->view('main/header');
                $this->view('users/index', ['utenti'=>[], 'messaggio'=>$messaggio]);
                $this->view('main/footer');
            }
            else{
                $this->view('main/header');
                $this->view('users/signup');
                $this->view('main/footer');
            }
        }
        else{

            $this->view('main/header');
            $this->view('users/index', ['utenti'=>$utenti->findAll()]);
            $this->view('main/footer');
        }

    }

    public function login(){

        $utenti = $this->model("UtentiDAO");
        $messaggio = "loggati";

        if(empty($_SESSION['email'])){
            if(isset($_POST['email']) && isset($_POST['password'])) {
                $_SESSION['email'] = $_POST['email'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $utente = new utente();
                $utente->email = filter_var($_POST['email'], FILTER_SANITIZE_URL);
                $utente->password = filter_var($_POST['password'], FILTER_SANITIZE_URL);
                $role = $utenti->findRole($email, $password);
                $id_user = $utenti->findUserID($email, $password);

                $_SESSION['id_author'] = $id_user;

                if($role == "amministratore"){
                    $_SESSION['admin'] = $role;
                }

                elseif ($role == "redattore") {
                    $_SESSION['redattore'] = $role;
                }

                elseif ($role == "lettore") {
                    $_SESSION['lettore'] = $role;
                }
            
                if ( $utenti->checkLogin($utente))
                {

                }
            }
            else{
                $this->view('main/header');
                $this->view('users/login');
                $this->view('main/footer');
            }
        }
        else{
            $this->index("test");
        }

    }

    public function logout(){

        require_once '../app/controllers/home.php';

        if(!empty($_SESSION['email'])){
            session_destroy();
            $messaggio = "Logout effettuato";
                
            $this->view('main/header');
            $this->view('users/index', ['utenti'=>[], 'messaggio'=>$messaggio]);
            $this->view('main/footer');
        }
        else{
            $this->view('main/header');
            $this->view('users/login');
            $this->view('main/footer');
        }
    }


    public function json($id=1){

        $utenti = $this->model("UtentiDAO");
        $data = $utenti->findOne($id);
        header('Content-Type: application/json');
        echo json_encode($data[0]->nome);

    }
}
