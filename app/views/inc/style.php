<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/font-awesome.css">

  <title><?php echo SITENAME; ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-light" style="position: fixed;width:100%;z-index:10;">
<div class="container">
    <a class="navbar-brand text-primary" href="<?php echo URLROOT; ?>/pages"><b><?php echo SITENAME; ?></b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php if(isset($_SESSION['user_id'])) : ?>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
           <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </li>
        
      </ul>
    <?php else: ?>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
        </li>
      </ul>
    <?php endif; ?>
    </div>
</div>
</nav>



<style type="text/css">
  *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  body{
    font-family: 'Open Sans', sans-serif;
    line-height: 1.5;
  }

  a{
    text-decoration: none;
    color: antiquewhite;
  }
  h1{
    font-weight: 300;
    font-size: 60px;
    line-height: 1.2;
    margin-bottom: 15px;

  }
  .showcase{
    position: relative;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0 20px;
    color: antiquewhite;
  }
  .video-container{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background:rgba(0, 0, 0, 0.6) url('img/panel1.jpg') no-repeat center center/cover;
  }
  .video-container video{
    min-height: 100%;
    min-width: 100%;
    object-fit: cover;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .video-container:after{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
  }
  .content{
    z-index: 10;
  }


  </style>
