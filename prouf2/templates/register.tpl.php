
<!DOCTYPE html>
<html lang="en">
<head>
<title>Proyecte APP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/public/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
 </head>
 <body>
 
 <nav class="navbar navbar-inverse">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">App</a>
     </div>
     <div id="nav2">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li><a href="<?=BASE?>index"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        </div>
 </nav>
<center>
 <div id="register">
         <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?=BASE?>register/reg" method="post">
                            <h3 class="text-center text-info">Sing up</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username2" id="username2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Email:</label><br>
                                <input type="text" name="email2" id="email2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password2" id="password2" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
<?php
include 'templates/footer.tpl.php';
?>