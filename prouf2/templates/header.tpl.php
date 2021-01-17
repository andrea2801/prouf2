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
          <li class="active"><a href="<?=BASE?>home"><?= $user;?>-<?= $id;?></a></li>
        </ul>
        
        <ul class="nav navbar-nav">
          <li><a href="<?=BASE?>post">My Posts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?=BASE?>logout/out"><span class="glyphicon glyphicon-log-in"></span> Exit</a></li>
        </ul>
        </div>
 </nav>
  


