<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/font-awesome.css">
  <!-- <script src="https://unpkg.com/htmx.org@1.9.3"></script> -->
  <title><?php echo SITENAME; ?></title>
</head>
<style type="text/css">

.well {
    background: none;
}

input.parsley-error,
select.parsley-error,
textarea.parsley-error {    
    border-color:#D43F3A;
    box-shadow: none;
}

input.parsley-error:focus,
select.parsley-error:focus,
textarea.parsley-error:focus {    
    border-color:#D43F3A;
    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #FF8F8A;
}

input.parsley-success,
select.parsley-success,
textarea.parsley-success {    
    border-color:#398439;
    box-shadow: none;
}

input.parsley-success:focus,
select.parsley-success:focus,
textarea.parsley-success:focus {    
    border-color:#398439;
    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #89D489
}

.parsley-errors-list {
    list-style-type: none;
    padding-left: 0;
    margin-top: 5px;
    margin-bottom: 0;
}

.parsley-errors-list.filled {
    color: #D43F3A;
    opacity: 1;
}
</style>
<body>
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="container" style="margin-top: 120px;">