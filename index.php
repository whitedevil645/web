<?php
session_start();
if(isset($_SESSION['usr_name'])) {
  //check if user is logged in ...if yes redirect to customer.php
  header("Location: customer.php");
}?>





<?php 
// session_start();
    if(isset($_POST['username'])){
      include_once("includes/dbconnect.php");

      $username=$_POST["username"];
      $pass=$_POST["password"];

      $sql = "select * from user_accounts where user_id = '".$username."' AND password ='".$pass."'";

      $result = $conn->query($sql);
      if($result){
        if ($result->num_rows > 0) {

          // output data of each row
          while($row = $result->fetch_assoc()) {
            //session_start();
            session_regenerate_id(true);
            $_SESSION['usr_name']= $row['user_id'];
            header("Location:customer.php");
          }
        } else {
          
          // echo "<span  class='error_msg'>Please check Username & Password.</span>"; 
          echo "<script>alert(\"Please check Username & Password.\")</script>";  
          echo "<script> window.location=\"index.php\"</script>";
          
        }
      // }else{
        echo '<br>'.mysqli_error($conn);
        }
      $conn->close();
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
        <li><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact us</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluidtext-center">
  <br><br><h1 class="margin text-center">Smart way to Bank</h1>  </div>
  <br><br>
 <div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 well">
      <form role="form" action="" method="post">
        <fieldset>
          <legend>Login</legend>
          
          <div class="form-group">
            <label for="name">Username</label>
            <input type="text" name="username" placeholder="username" required class="form-control" />
          </div>

          <div class="form-group">
            <label for="name">Password</label>
            <input type="password" name="password" placeholder="Your Password" required class="form-control" />
          </div>

          <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-primary" />
          </div>
        </fieldset>
      </form>
      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
    </div>
  </div>

</div>



</body>
</html>