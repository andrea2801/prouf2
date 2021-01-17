<?php

namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;
use App\DB;

final class RegisterController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }
    public function index()
    {
        $dataview = ['title' => 'Register'];
        $this->render($dataview);
    }
    public function reg()
    {
        if (
            isset($_POST['email2']) && !empty($_POST['email2'])
            && isset($_POST['password2']) && !empty($_POST['password2'])
            && isset($_POST['username2']) && !empty($_POST['username2'])
        ) {

            $nameRegister = filter_input(INPUT_POST, 'username2', FILTER_SANITIZE_SPECIAL_CHARS);
            $emailRegister = filter_input(INPUT_POST, 'email2', FILTER_SANITIZE_SPECIAL_CHARS);
            $userpasswd = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);
            $userpasswd2 = password_hash($userpasswd, PASSWORD_BCRYPT, ["cost" => 4]);
            
            $table = 'user';
            $data = ['email' => $emailRegister,'username' => $nameRegister,  'passwd' => $userpasswd2, 'rol'=>3];
            
            $insertar = $this->insertuser($table, $data);
            
          
            if ($insertar) {
                $_SESSION['usuario'] = $insertar;

                header('Location:' . BASE . 'index');
            } else {
                header('Location:' . BASE . 'register');
            }
        } else {
            header('Location:' . BASE . 'register');
        }
    }//Funció de inserción de datos
    function insertuser($table,$data):bool 
    {
        if (is_array($data)){
            $columns='';
            $bindv='';
            $values=null;
              foreach ($data as $column => $value) {
                  $columns.='`'.$column.'`,';
                  $bindv.='?,';
                  $values[]=$value;
              }
              $columns=substr($columns,0,-1);
              $bindv=substr($bindv,0,-1);
              
              
             
              $sql="INSERT INTO {$table}({$columns}) VALUES ({$bindv})";
              
            try {
                $stmt = $this->getDB()->prepare($sql);
                $stmt->execute($values);
                
            } catch (\PDOException $e) {
                echo $e->getMessage();
                return false;
            }

            return true;
        }
        return false;
    }
    
}
