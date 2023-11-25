<?php
   include '../lib/session.php';
   Session::checkSession();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css"></link>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- flaticon -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- drivejs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>
  </head>
</head>
<body >
 <!-- nav -->
 <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3175ee;">
    <div id="highlight-me">
      <i id="btn_song" class="fi fi-rr-music-note-slash" style="font-size: 26px; color: #fff; cursor: pointer;"></i>
    </div>
    <audio src="../audio/golden_hour_song.mp3" controls loop style="display:none;" id="song"></audio>
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="../assets/img/logo.svg" width="100" height="80" alt="Swiss Collection">
    </a>

    <ul class="navbar-nav mr-auto ml-auto mt-lg-0" style="color: #fff; font-size: 26px;">Welcome to the Administration Dashboard</ul>
    
    <?php
        if(isset($_GET['action']) && $_GET['action']=='logout') {
            Session::destroy();
        }
    ?>
    
    <div id="admin-logout">  
        Log out 
        <i class="fa fa-sign-out" aria-hidden="true"></i>
    </div>  
</nav>
