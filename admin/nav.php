<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Devhunt</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-kit5438.css?v=1.2.0" rel="stylesheet" />

  <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-white fixed-top">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="../index.php"> Devhunt </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" data-nav-image="../assets/img/blurred-image-1.jpg" data-color="orange">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="now-ui-icons design_app"></i>
              <p>home</p>
            </a>
          </li>
          <?php
          if(isset($_SESSION['admin_name'])){

          ?>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenu" data-toggle="dropdown">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Panels</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class=" dropdown-item" href="users.php">
                <i class="now-ui-icons users_single-02"></i>
                <p>users</p>
              </a>
              <a class="dropdown-item" href="employer.php">
                <i class="now-ui-icons business_badge"></i>
                <p>Employers</p>
              </a>
              <a class="dropdown-item" href="contact.php">
                <i class="now-ui-icons tech_mobile"></i>
                <p>Contact</p>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="now-ui-icons ui-1_lock-circle-open"></i>
              <p>logout</p>
            </a>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>