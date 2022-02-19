<?php

include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    
    if (($amount)<0)
    {
        echo '<script type="text/javascript">';
        echo ' alert(" Negative values cannot be transferred")';
        echo '</script>';
    }
   
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert(" Insufficient Balance")'; 
        echo '</script>';
    }
      
    else if($amount == 0)
    {
        echo "<script type='text/javascript'>";
        echo "alert('Zero value cannot be transferred')";
        echo "</script>";
    }

    else 
    {
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($conn,$sql);
           
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($conn,$sql);
        
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query)
        {
            echo "<script> alert('Transaction Successful'); window.location='transfermoney.php';</script>";   
        }

        $newbalance= 0;
        $amount =0;
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" text="text/css" href="css/style.css">

    <style>
    	
		button
        {
			border:none;
			background: #d9d9d9;
            transition: 1.5s;
		}
	    button:hover
        {
			background-color:#0c5991;
			transform: scale(1.1);
			color:white;
		}

        .navbar
        {
            font-size:18px
        }
        
        .navbar-brand
        {
            font-size:25px
        }

        h2
        {
            font-size: 40px;
        }
        table
        {
            letter-spacing: 1.2px;
        }
        td
        {
            text-align: center;
        }

    </style>
</head>

<body>
 
<?php
  include 'navbar.php';
?>

    <div class="container">
        <h2 class="text-center pt-4">Transaction</h2>

            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>

            <form method="post" name="tcredit" class="tabletext" ><br>
            
            <div>
                <table class="table table-striped table-condensed table-bordered">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Balance</th>
                    </tr>

                    <tr>
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name'] ?></td>
                        <td class="py-2"><?php echo $rows['email'] ?></td>
                        <td class="py-2"><?php echo $rows['balance'] ?></td>
                    </tr>
                </table>
            </div>

            <br>
            <br>
            <br>

            <label>Transfer To:</label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                
                <?php
                    include 'config.php';
                    $sid=$_GET['id'];
                    $sql = "SELECT * FROM users where id!=$sid";
                    $result=mysqli_query($conn,$sql);
                    if(!$result)
                    {
                        echo "Error ".$sql."<br>".mysqli_error($conn);
                    }
                    while($rows = mysqli_fetch_assoc($result)) {
                ?>

                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Current Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
                <?php 
                    } 
                ?>
                <div>
            </select>
            <br>
            <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
                <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
                </div>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>