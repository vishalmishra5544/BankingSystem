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
    <style>
        table,th,td{
            border:2px solid black;
            width:1100px;
            background-color: lightgreen;
        }
    </style>
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
    <div class="container">
    <div class="alert alert-primary d-flex align-items-center" role="alert" style="text-align:center">
    </div>
    <h2 style="color:blue; text-align:center"><strong>Customers Records</strong> </h2>
    <div class="alert alert-primary d-flex align-items-center" role="alert" style="text-align:center">
    </div>
    </div>
    </header>
    <section>
      <?php
        $server="localhost:3306";
        $username="root";
        $password="";
        $dbname = "bankingsystem";
    
        $connection=mysqli_connect($server, $username, $password , $dbname);
        if (!$connection) {
            die("connection to this database failed due to".mysqli_connect_error());
        }
        $query="SELECT * FROM `details`";
        $query_run=mysqli_query($connection,$query); 
        if(mysqli_num_rows($query_run)>0){
                        
                 ?>

<div class="container">
        <div class="row text-center">
            <div class="col text-center">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-striped table-sm">
                        <thead style="color : black;" class="table-danger">
                            <tr>
                                <th scope="col" class="text-center py-2">Sr.no</th>
                                <th scope="col" class="text-center py-2">Name of Customer</th>
                                <th scope="col" class="text-center py-2">Email</th>
                                <th scope="col" class="text-center py-2">Phone no</th>
                                <th scope="col" class="text-center py-2">Balance</th>
                                <th scope="col" class="text-center py-2">State</th>
                                <th scope="col" class="text-center py-2">Balance</th>
                                <th scope="col" class="text-center py-2">options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row=mysqli_fetch_array($query_run)){
                            ?>
                                <tr style="color : black;">
                                    <td class="text-center py-2"><?php echo $row['srno'];?></td>
                                    <td class="text-center py-2"><?php echo $row['name'];?></td>
                                    <td class="text-center py-2"><?php echo $row['email'];?></td>
                                    <td class="text-center py-2"><?php echo $row['phoneno'];?></td>
                                    <td class="text-center py-2"><?php echo $row['pincode'];?></td>
                                    <td class="text-center py-2"><?php echo $row['state'];?></td>
                                    <td class="text-center py-2"><?php echo $row['balance'];?></td>
                                    <td ><a class="btn btn-primary" href="customersdetails.php?srno=<?php echo $row['srno'];?>" >Transfer money</a></td> 
                                 </tr>
                            <?php
                            }
                        }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </section>
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
</body>
</html>