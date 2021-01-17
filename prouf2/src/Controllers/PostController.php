<?php

namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;
use App\DB;

final class PostController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }
    public function index()
    {
        
       $this->postweb();
    }
    function postweb(){
        $user=$this->session->get('username');
        $userd=$this->session->get('email');
        $condition = ['user', $user['id']];
        $data = $this->getDB()->selectCondicion('post', ['id','title','cont','create_date','modify_date'], $condition);       
        $this->render(['user' => $userd,'id'=>$user['id'], 'data' => $data], 'post');
    }
    public function insertpost()
    {
        $title=filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
        $cont= filter_input(INPUT_POST, "cont", FILTER_SANITIZE_SPECIAL_CHARS);
        $user=$this->session->get('username');
        $userd=$this->session->get('email');
        $campos = ['title' => $title,'cont' => $cont,'user'=> $user['id']];
        $data = $this->getDB()->insert('post', $campos );
        $this->postweb();
    }
    public function deletepost(){
        $postt= filter_input(INPUT_POST, 'postt', FILTER_SANITIZE_STRING);
        $data = $this->getDB()->delete('post', $postt);
        $this->postweb();
         
    }
    
  

}
