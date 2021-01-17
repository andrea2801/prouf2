<?php

namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;
use App\DB;

final class HomeController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }
    public function index()
    {
        $this->blog();
    }
    
    function blog(){
        $user=$this->session->get('username');
        $userd=$this->session->get('email');
        $tabla='post';
        $filas=['id','title', 'cont', 'user', 'create_date', 'modify_date'];
        $data = $this->getDB()->selectAll($tabla, $filas);
        $this->render(['user' => $userd,'id'=>$user['id'], 'data' => $data], 'home');
    }
    
    public function insertcoment()
    {
        $title=filter_input(INPUT_POST, "comentario", FILTER_SANITIZE_SPECIAL_CHARS);
        $post=filter_input(INPUT_POST, "posts", FILTER_SANITIZE_SPECIAL_CHARS);
        $user=$this->session->get('username');
        $userd=$this->session->get('email');
        $campos = ['comment' => $title,'user' => $user['id'],'post'=> $post];
        $data = $this->getDB()->insert('comments', $campos );
        $this->blog();
    }
        
    function mostrarcom(){
        $post=filter_input(INPUT_POST, "idpost", FILTER_SANITIZE_SPECIAL_CHARS);
        $user=$this->session->get('username');
        $userd=$this->session->get('email');
        $tabla2='comments';
       $filas2=['comment', 'user', 'post'];
        $condicion=['post',$post];  
        $com= $this->getDB()->selectCondicion($tabla2, $filas2,$condicion);  
        $this->render(['user' => $userd,'id'=>$user['id'],  'com' => $com], 'home');
       
    }
   

}
# id, comment, user, post
