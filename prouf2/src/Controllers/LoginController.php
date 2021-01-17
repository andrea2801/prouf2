<?php
namespace App\Controllers;

use App\Controller;
use App\Request;
use App\Session;
use App\DB;

final class LoginController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }
    public function index()
    {
        $dataview = ['title' => 'Todo'];
        $this->render($dataview);
    }
    
    public function log()
    
    {

        if (
            isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['password']) && !empty($_POST['password'])
        ) {

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $user =$this->auth($email, $pass);
            
               
                if ($user==true) {
                    $_SESSION['user'] = $user;
                    //si usuari valid
                    if (isset($_POST['remember']) && ($_POST['remember'] == 'on' || $_POST['remember'] == '1')) {
                        $path=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
                        setcookie('username', $user['username'], $hour,$path);
                        setcookie('email', $user['email'], $hour,$path);
                        setcookie('active', 1, $hour,$path);  
                    }header('Location:' . BASE . 'home');
                    
                }else {
                header('Location:' . BASE . 'index');
            }
            

            
}}
 //Función para autentificar los usuarios
 protected function auth($email, $pass): bool
 {

     try {
         $stmt = $this->getDB()->prepare('SELECT * FROM user WHERE email=:email LIMIT 1');
        
         $stmt->execute([':email' => $email]);
         $count = $stmt->rowCount();
         $row = $stmt->fetchAll(\PDO::FETCH_ASSOC);

         if ($count == 1) {
             $user = $row[0];
             $res = password_verify($pass, $user['passwd']);

             if ($res) {
                 $this->session->set('username', $user);
                 $this->session->set('email', $email);
                 
                 return true;
             } else {
                 return false;
             }
         } else {
             return false;
         }
     } catch (\PDOException $e) {
         return false;
     }
 }

}
        
    
    
