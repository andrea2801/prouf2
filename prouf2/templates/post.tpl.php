
<?php

include 'header.tpl.php';
?>
<main id="home" >
<section class="container">
        <p><h3>Tus Posts</h3>
        <form action='' method='post'><input type='submit' name='insertar' value='nuevo'></form></p>
       
        <?php
        if(isset($_POST['insertar'])){
        ?>
        <h2>Nuevo Posts</h2>
             <form action="<?= BASE ?>post/insertpost" method="POST">
       
            
           <p> <input required type="text" name="title" placeholder="titulo">
            <input required type="text" name="cont" placeholder="Descripcion de la tarea">
 <button type="submit">Crear</button></p>
            </form>
        <?php
         }
        
        ?>
      
        
    <div class="scroll">
    <?php
   
   if (isset($data)) {
       if (count($data) > 0) {
?>
         <table class="table">
               
               <?php

               foreach ($data as $valor) {
                   echo "<tr class='post'>";
                   foreach ($valor as $key => $value) { 
                       $this->session->set('id', $value);
                       if ($key == "id") {
                           $postt = $value;

              
                       }
                       echo "<td>" . $value . "</td>";
                       
                   } 
                   echo "<td><form action='". BASE . "post/deletepost' method='post'><input type='hidden' name='postt' value='$postt'><input type='submit' value='eliminar'></form></td>";
                
                   echo "</tr> <br>";

                }
               
              
               
               ?>
           
           </table></div>
       <?php
   }
  
}


        
        ?>
</main>
<?php
include 'templates/footer.tpl.php';
?>


