<!DOCTYPE html>
<html lang="en">
<head>
    <title>Banking Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" text="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    
    <style>
    
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
  include 'navbar.php';
?>   

    <div id="demo" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/bg5.png" alt="ab" width="1100" height="500">
        </div>

        <div class="carousel-item">
          <img src="image/bg4.png" alt="abc" width="1100" height="500">
        </div>

        <div class="carousel-item">
          <img src="image/bg3.png" alt="abcd" width="1100" height="500">
        </div>

      </div>

      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>

      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>


    <section class="my-1">
      
      <div class="py-5">
        <h1 class="text-center" style="color: #0c5991;">Our Services</h1>
      </div>

      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-4 col-md-4 col-12">
            <div class="card">
              <img class="card-img-top" src="image/user.png" alt="Card image" width="300px" height="350px">
              <div class="card-body">
                <h4 class="card-title">create Profile</h4>
                <a href="create.php" class="btn btn-primary">create</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-12">
            <div class="card">
              <img class="card-img-top" src="image/trans.png" alt="Card image" width="300px" height="350px">
              <div class="card-body">
                <h4 class="card-title">Make Transaction</h4>
                <a href="transfermoney.php" class="btn btn-primary">Make Transaction</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-12">
            <div class="card">
              <img class="card-img-top" src="image/hist.png" alt="Card image" width="300px" height="350px">
              <div class="card-body">
                <h4 class="card-title">Transaction History</h4>
                <a href="transactionhistory.php" class="btn btn-primary">view</a>
              </div>
            </div>
          </div>
        
        </div>
            
      </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <footer>
      <h5 class="p-1 text-white text-center" style="background-color: #0c5991;">@2022 Bhumi Chaudhary</h5>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>