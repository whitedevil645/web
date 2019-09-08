<?php
session_start();
if(!isset($_SESSION['usr_name'])) {
  //check if user is logged in ...if not redirect to index.php
  header("Location: index.php");
}?>
<?php
include 'includes/dbconnect.php';
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

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">SYNDICATE BANK  2.0</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_name'])) { ?>
					<li><a href="logout.php">Logout</a></li>
				<?php } else { ?>
				<li><a href="logout.php">Logout</a></li>
				<?php } ?>
				<li><a href="contactus.php">Contact us</a></li>
			</ul>
		</div>
	</div>
</nav>
<div style="color: blue;" class="container-fluid">

<h3>Welcome, <?php echo $_SESSION['usr_name']; ?></h3>
</div>
<br><br><br><br>
<div style="width: 20px; height: 30px; align-items: center"></div>
<div class="col-lg-2">
	<ul class="navbar navbar-default nav" style="height: 200px; "><br>
		<li><a href="DD.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>DD</b></span></a></li>
		<li><a href="cheque.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Cheque</b></span></a></li>
		<li><a href="neft-rtgs.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>NEFT&nbsp;/&nbsp;RTGS</b></span></a></li>
		<!-- <li><a href="Loan.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Loans</b></span></a></li> -->
	</ul>
</div>
		

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

