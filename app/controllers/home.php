<?php 

class home extends Controller
{
    public function index($nome = '')
    {
        $post = $this->model("PostDAO");
        $this->view('main/header');
        $this->view('main/home',['posts'=>$post->findAll()]);
        $this->view('main/footer');
    }
}