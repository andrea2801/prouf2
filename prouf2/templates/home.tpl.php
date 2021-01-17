
<?php

include 'header.tpl.php';
?>
<main id="home" >
<section class="container" >
    <center>
        <h1>Blog</h1>
        <h3>Comparte y habla a mas personas</h3>
    <div class="scroll">
    <?php
   if (isset($data)){
     
       if (count($data) > 0) {
?>
         <table class="table">
              
               <?php
echo "<form action='' method='post'><input type='submit' name='masinfo'  value='Mostrar mas informacion de posts'>
</form><br>"; 
               foreach ($data as $valor) {

                   echo "<tr><pre>";
                   foreach ($valor as $key => $value) {
                 
                       if ($key == "id") {
                           $postid = $value;

                           echo "<p> </p>";
                       }  
                    
                if ($key == "title") {
                        $posts2 = $value; 
                          echo "<h2>" . $value . "</h2>";
                          
                    }
                    if ($key == "user") {
                        $posts3 = $value; 
                          echo "<p>Autor: id-" . $value . "</p>";
                          
                        }
                        if(isset($_POST['masinfo'])){
                            if ($key == "cont") {
                                $posts4 = $value; 
                                  echo "<span>" . $value . "</span>";}
                                  if ($key == "create_date") {
                                    $posts5 = $value; 
                                      echo "<span>" . $value . "</span>";}
                                      if ($key == "modify_date") {
                                        $posts6 = $value; 
                                          echo "<span>" . $value . "</span>";}

                        }
                    
                                      
                       
                }echo "<h6>Añadir comentario, Post num ".$postid." </h6><form action='". BASE . "home/insertcoment' method='POST'><input required type='text' name='comentario' placeholder='comentario'><input  type='hidden' name='posts' value='$postid'>  <button type='submit'>Añadir</button></p></form>";
                echo "<form action='".BASE."home/mostrarcom' method='post'><input  type='hidden' name='idpost' value='$postid'><input type='submit'  name='comentarios' value='ver comentarios'></form>";
                echo    "</pre></tr>";
              
               
               
               }
                   
              }
              }
              if(isset($_POST['comentarios'])) {
                 echo "<h3>Comentarios del post seleccionado </h3>";
                foreach($com as $come){
                  foreach($come as $k => $val){
                    
                    if ($k == "user") {
                      $comment = $val; 
                        echo "<h2> Usuario id-" . $val . "</h2>";
                        
                  }
                  if ($k == "comment") {
                    $comment = $val; 
                      echo "<h2>" . $val . "</h2>";
                      
                }  
              }
                }
              }

?>
</table>
       
        </center>
</main>
<?php
include 'templates/footer.tpl.php';
?>


