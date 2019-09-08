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
      $Pay=$_POST['Pay'];
      $Cheque_no=$_POST['Cheque_no'];

      $Amount_in_Rupees=$_POST['Amount_in_Rupees'];
      $Amount=$_POST['Amount'];

       
      $transtype='Cheque';
      $is_approved='pending';
      $sql = "INSERT INTO user_last_transactions ( user_id, transaction_type,is_approved) 
        VALUES ('$usr_id', '$transtype', '$is_approved')";
    if ((mysqli_query($con,$sql))) {
        

        $sql1= "INSERT INTO `cheque`(`user_id`, `pay`, `cheque_no`, `amount`, `amount_in _rupees`) VALUES ('$usr_id', ' $Pay', '$Cheque_no', ' $Amount', ' $Amount_in_Rupees')";
      if(mysqli_query($con,$sql1)){
        echo "<script>alert(\"Your request is processing,wait for your number\")</script>";
        echo "<script> window.location=\"Logout.php\"</script>";
      }
      else
      {
        echo "<script>alert(\"could not process your request\")</script>";
      }
      }  

  }
      
    

?>





<!DOCTYPE html>
<html>
<head>
  <title>SYNDICATE s</title>
  
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
          <legend><center>Enter Cheque Details</center></legend>
          
          <div class="form-group">
            <label for="name">Pay</label>
            <input type="text" name="Pay" placeholder="Pay" required class="form-control" required/>
          </div>

          <div class="form-group">
            <label for="name">Cheque no</label>
            <input type="text" name="Cheque_no" placeholder="Cheque no" required class="form-control" required/>
          </div>

          <div class="form-group">
            <label for="name">Amount</label>
            <input type="text" name="Amount" placeholder="Amount" required class="form-control" required/>
          </div>

          <div class="form-group">
            <label for="name">Amount in Rupees</label>
            <input type="text" name="Amount in Rupees" placeholder="Amount in Rupees" required class="form-control" required/>
          </div>

        <div class="w3-agree">
            <input type="checkbox" id="terms_condi" name="cc" required>
              <label class="agileits-agree">I accept the <a href=""><b>Terms and Conditions</b>.</a></label>
        </div> 
        
        <div class="form-group">
           <center><input type="submit" name="Print challan" value="send request" class="btn btn-primary" />
          </div>
        </fieldset>
      </form>
      <!-- <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span> -->
    </div>
  </div>

</div>



</body>
</html>