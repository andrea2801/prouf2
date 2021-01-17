<?php
namespace App\Controllers;

use App\Controller;
use App\Request;
use App\Session;

final class IndexController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request,$session);
    }
    public function index(){
        $db=$this->getDB();
        //$data=$db->selecAll('Users');
        
        //uso de funciones declaradas en el modelo 
        //y definidad en la clase abstracta
        //$stmt=$this->query($db,"SELECT * FROM users ",null);
        //$result=$this->row_extract($stmt);
        $dataview=['title'=>'Todo'];
        $this->render($dataview);
       // $dataview=['login'=>'Login'];
        //$this->render($dataview,'login');
    }
}