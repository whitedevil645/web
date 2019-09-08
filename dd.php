<?php
session_start();
if(!isset($_SESSION['usr_name'])) {
  //check if user is logged in ...if not redirect to index.php
  header("Location: index.php");
}?>


<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      $host="localhost"; // Host name
      $username="root"; // Mysql username
      $password=""; // Mysql password
      $db_name="temp_db"; // Database name

    // Connect to server and select databse.
      $con=mysqli_connect("$host", "$username", "$password")or die("cannot connect");

      mysqli_select_db($con,"$db_name")or die("cannot select DB");
      $usr_id=$_SESSION['usr_name'];  
      
      $mode_of_payment=$_POST['mode_of_payment'];
      $Benificiary=$_POST['Benificiary'];
      $Remitter=$_POST['Remitter'];
      $Amount_in_Rupees=$_POST['Amount_in_Rupees'];
      $Amount=$_POST['Amount'];

      $transtype='DD';
      $is_approved='pending';
      $sql = "INSERT INTO user_last_transactions ( user_id, transaction_type,is_approved) 
        VALUES ('$usr_id', '$transtype', '$is_approved')";
  
      // $result = mysqlexec($sql);
      if ((mysqli_query($con,$sql))) {
        

        $sql1= "INSERT INTO dd ( user_id  , benificiary, remitter , amount, amount_in_rupees, mode_of_payment) 
      VALUES (' $usr_id', '$Benificiary', '$Remitter', '$Amount', '$Amount_in_Rupees', '$mode_of_payment')";
      mysqli_query($con,$sql1);
        echo "<script>alert(\"Your request is processing,wait for your number\")</script>";
        echo "<script> window.location=\"Logout.php\"</script>";

      }  

  }
      
    

?>





<!DOCTYPE html>
<html>
<head>
  <title>SYNDICATE BANK 2.0</title>
  
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

<body>

  <!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">SYNDICATE BANK 2.0</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Logout.php">Logout</a></li>
        <li><a href="contact.php">Contact us</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br>
<div class="container-fluidtext-center">
 <div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 well">
      <form role="form" action="" method="post">
        <fieldset>
          <legend><center>Enter DD Details</center></legend>
          
          <div class="form-group">
            <label for="name">Benificiary</label>
            <input type="text" name="Benificiary" placeholder="Benificiary" required class="form-control" required/>
          </div>

          <div class="form-group">
            <label for="name">Remitter</label>
            <input type="text" name="Remitter" placeholder="Remitter" required class="form-control" required/>
          </div>

          <div class="form-group">
            <label for="name">Amount</label>
            <input type="text" name="Amount" placeholder="Amount" required class="form-control" required/>
          </div>

          <div class="form-group">
            <label for="name">Amount in Rupees</label>
            <input type="text" name="Amount_in_Rupees" placeholder="Amount in Rupees" required class="form-control" required/>
          </div>

         <div class="form-group">
              <label for="sel1">Select Mode of Payment:</label>
                <select class="form-control"  name="mode_of_payment"required>
                  <option value="">Select</option>
                  <option>Cheque</option>
                  <option>Cash</option>
                </select>
        </div>

        <div class="w3-agree">
            <input type="checkbox" id="terms_condi" name="cc" required>
              <label class="agileits-agree">I accept the <a href=""><b>Terms and Conditions</b>.</a></label>
        </div>

        
        <div class="form-group">
           <center><input type="submit" name="Print challan" value="Print challan" class="btn btn-primary" />
          </div>
        </fieldset>
      </form>
      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
    </div>
  </div>

</div>



</body>
</html>