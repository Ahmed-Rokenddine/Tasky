 <!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title><?php echo SITENAME; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css">
  
  <link href="https://fonts.cdnfonts.com/css/qirkus" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>public/css/style.css">   
  <style>
    .row{
  --bs-gutter-x: 0;
}
  </style>
  </head>
  
  
  <body  >



      
      <nav class="navbar navbar-expand-lg fixed-top transparent mb-5">
        

        <div class="container-fluid container d-flex align-items-center justify-content-between" style="gap: 28%;">
          
          <a href="<?php echo URLROOT;?>"  class="navbar-brand d-flex align-items-center ml-2 ml-lg-0"  max-width="150%"><img src="<?php echo URLROOT;?>/public/img/tasky.png" max-width="150%" style="height: 60px;" alt="" class="img-fluid"> <h2 class="mb-0 logot">TASKY</h2></a>
          <button class="navbar-toggler mr-1 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="">   
    <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
</span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarText">
            <ul class="navbar-nav   mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link f text-center rounded" <?php   if( URLROOT == 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']){echo " style='color:#C62B2C;'"; } ?>  href="<?php echo URLROOT;?>">HOME</a>
                      
                </li>
                
                <?php if(isset($_SESSION['user_id'])) : ?>
                  <li class="nav-item">
                  <a class="nav-link f text-center rounded" <?php   if( URLROOT .'tasks/index' == 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']){echo " style='color:red;'"; } ?> href="<?php echo URLROOT;?>tasks/index">TASKMANAGER</a>
                  </li>

                
                <?php endif; ?>
                <li class="nav-item">
                    <a  class="nav-link f text-center rounded"  <?php   if( URLROOT .'pages/about' == 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']){echo " style='color:red;'"; } ?> href="<?php echo URLROOT;?>pages/about">ABOUT</a>
                </li>
              </ul>
              <div class="d-flex align-items-center justify-content-center ">
              <ul class="navbar-nav ">
          
          <?php if(isset($_SESSION['user_id'])  ) : ?>
          <li class="nav-item d-flex align-items-center">
          <div class="text-light align-items-center mr-1 f"><?php echo $_SESSION['user_name'] ?> </div> <img src="<?php echo URLROOT;?>/public/img/User.png" width="40px" alt=""><a class="nav-link ml-3 f rounded" href="<?php echo URLROOT; ?>/users/logout">Logout</a> 
              
          </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link text-dark btn btn-light px-3 me-2" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item ml-2 mt-1 mt-lg-0">
              <a class="nav-link text-white btn btn btn-outline-light me-3" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
        </ul>
        
                
              </div>
          </div>
        
         </div>
      </nav>
      <div class="bg-light " style="overflow-x:hidden ">
      <section class="extra-margin align-items-center justify-content-center container bg-white shadow" style="">
      