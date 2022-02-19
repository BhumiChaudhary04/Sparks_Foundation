<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" text="text/css" href="css/style.css">

    <style>

        h2
        {
          font-size: 40px;
        }

        .createimg
        {
          width:100%;
          height:400px;
        }

        .navbar
        {
          font-size:18px
        }
        
        .navbar-brand
        {
          font-size:25px
        }

    </style>
    
</head>

<body>

<?php

include 'config.php';

if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $balance=$_POST['balance'];

  $sql="insert into users(name,email,balance) values('{$name}','{$email}','{$balance}')";
  $result=mysqli_query($conn,$sql);
  
  if($result)
  {
    echo "<script> alert('New user is created'); window.location='transfermoney.php';</script>";
  }
}

?>

<?php
  include 'navbar.php';
?>

<h2 class="text-center pt-4">Create a User</h2>
<br>

<section class="my-5">

  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-6 col-md-6 col-12">
        <img src="image/user.png" class="image-fluid createimg">
      </div>

      <div class="col-lg-6 col-md-6 col-12">
        <form action="create.php" method="post">

          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" autocomplete="off" class="form-control" required>
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" autocomplete="off" class="form-control" required>
          </div>

          <div class="form-group">
              <label>Balance</label>
              <input type="number" name="balance" autocomplete="off" class="form-control" required>
          </div>
          
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        
        </form>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>