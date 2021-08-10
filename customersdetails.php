<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Co-operative Bank</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
    <nav  class="navbar py-2 navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" width="10%" height="9%" alt="MCB" href="index.php"></img><strong>  Mega Co-operative Bank</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-8 mb-lg-0">
                    <li class="nav-item py-3">
                        <a class="nav-link active" aria-current="page" href="index.php"><strong>Home</strong></a>
                    </li>
                    <li class="nav-item py-3">
                        <a class="nav-link active" href="customerslist.php "><strong>Customers</strong></a>
                    </li>
                    <li class="nav-item py-3">
                        <a class="nav-link active" href="transactionrecords.php "><strong>Transactions</strong></a>
                    </li>
                    <li class="nav-item py-3">
                        <a class="nav-link active" href="aboutus.php "><strong>About</strong></a>
                    </li>
                    <li class="nav-item py-3">
                        <a class="nav-link active" href="contactus.php "><strong>Contact</strong></a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
        <h1>MEGA CO-OPERATIVE BANK</h1>
<?php
$server="localhost:3306";
$username="root";
$password="";
$dbname = "bankingsystem";

$connection=mysqli_connect($server, $username, $password , $dbname);
if (!$connection) {
    die("connection to this database failed due to".mysqli_connect_error());
}

if(isset($_POST['submit']))
{
    $from = $_GET['srno'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from details where srno=$from";
    $query = mysqli_query($connection,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from details where srno=$to";
    $query = mysqli_query($connection,$sql);
    $sql2 = mysqli_fetch_array($query);



    //Conditions
    //For negative value
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Negative value cannot be transferred !")';
        echo '</script>';
    }
    //Insufficient balance
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! you have insufficient balance !")';
        echo '</script>';
    }
    //For 0 (zero) value
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Zero value cannot be transferred !')";
         echo "</script>";
     }


    else {
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE details set balance=$newbalance where srno=$from";
                mysqli_query($connection,$sql);
             
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE details set balance=$newbalance where srno=$to";
                mysqli_query($connection,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transactionrecords (`sendername`, `receivername`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($connection,$sql);

                if($query){
                     echo "<script> alert('Transaction Successfully !');
                                     window.location='transactionrecords.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

        <?php 
               $customerid=$_GET['srno'];
                $sql = "SELECT * FROM details where srno=$customerid";
                $result=mysqli_query($connection,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($connection);
                }
                $row=mysqli_fetch_assoc($result);
            ?>
         <form method="post" name="tcredit" class="tabletext" ><br>
        <div class="container">
        <div class="row text-center">
            <div class="col text-center">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-striped table-sm">
                        <thead style="color : black;" class="table-danger">
                <tr style="color : black;" class="table-primary">
                    <th class="text-center" >Sr.no</th>
                    <th class="text-center">Name of Customer</th>
                    <th class="text-center">Email</th>
                    <th class="text-center" >Phone no</th>
                    <th class="text-center">Balance</th>
                    <th class="text-center">State</th>
                    <th class="text-center">Balance</th>
                </tr>
                        </thead>
                        <tbody>
                <tr style="color : black;">
                    <td class=" text-center py-2"><?php echo $row['srno'];?></td>
                    <td class=" text-center py-2"><?php echo $row['name'];?></td>
                    <td class=" text-center py-2"><?php echo $row['email'];?></td>
                    <td class=" text-center py-2"><?php echo $row['phoneno'];?></td>
                    <td class=" text-center py-2"><?php echo $row['pincode'];?></td>
                    <td class=" text-center py-2"><?php echo $row['state'];?></td>
                    <td class=" text-center py-2"><?php echo $row['balance'];?></td>
                </tr>
                        </tbody>
            </table>
        </div>
        </div>
        </div>
       
        <h2 class="text-center pt-4" style="color : black;">Transer Money</h2>
        <label style="color : black;"><strong>Transfer To:</strong></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                $customerid=$_GET['srno'];
                $sql = "SELECT * FROM details where srno!=$customerid";
                $result=mysqli_query($connection,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($connection);
                }
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $row['srno'];?>" >
                
                    <?php echo $row['name'] ;?> (Balance: 
                    <?php echo $row['balance'] ;?> ) (state:<?php echo $row['state'] ;?>)
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><strong>Amount:</strong></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
                <button class="btn btn-outline-dark mb-3" name="submit" type="submit" id="myBtn" >Transfer</button>
            </div>
            </div>
        </form>       
    </header>
    <footer>
<div class="container">
           <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5" style="font-size:large;color:white;background-color:#9370db;">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            Mega Co-operative Bank
          </h6>
          <p>
            Come and join us in the process of the new age banking with loads of user friendly facilities.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Info pages
          </h6>
          <p>
            <a href="aboutus.php" class="text-reset">About us</a>
          </p>
          <p>
            <a href="contactus.php" class="text-reset">Contact us</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="customerslist.php" class="text-reset">Customers</a>
          </p>
          <p>
            <a href="transactionrecords.php" class="text-reset">Transactions</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p>MUMBAI,INDIA</p>
          <p>
            MCB@banking.in
          </p>
          <p>+ 022 232 537 12</p>
          <p>+ 022 294 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
  </br>
  <!-- Copyright -->
  <div class="text-center p-4"  style="font-size:x-large;color:white;background-color:blue;">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Mega Co-operative Bank</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
       </div>
   </footer>
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>