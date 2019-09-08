<!DOCTYPE html>
<html lang="en">
<head>
<title>


</title>
<style type="text/css">
  .big{
    height: 600px;
    width: 300px;
    background-color:white;
  }
  table, th, td {
  border: 1px solid white;
  width: 300px;

}
.btn{

  background-color: #4CAF50; /* Green */
  border: none;
 color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;

}
.btnred{

  background-color: #4CAF50; /* Green */
  border: none;
 color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
}

</style>
<meta charset="utf-8">
<link rel="stylesheet" href="web.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>



<header>
  <h2>SYNDICATE 2.0</h2>
</header>

<section>
  <nav>
    <ul>
      <li><a href="#">New user Detected!!!</a></li><li><pre></pre></li>
      <li><a href="#">Networth customer:"Gagan" found</a></li>
      <li><pre></pre></li>
      <li><a href="#">Netwoth customer:"Vivek" found</a></li>
    </ul>
  </nav>
  
  <article>
    <center>

      <img src="./work.png" height="500px" image-responsive>
    </center>
                        
  </article>
 <nav>
    <ul>
      <?php
     

      ?>
    </ul>
  </nav>
</section>

<button class="open-button" onclick="openForm()">REQUESTS</button>
 





<div class="chat-popup" id="myForm">
  
    
    <span style="color:white;font-size: 30px;">Requests Form</span>
    <div class="big">

      <?php 


$host="localhost"; // Host name
  $username="root"; // Mysql username
  $password=""; // Mysql password
  $db_name="temp_db"; // Database name

// Connect to server and select databse.
  $conn=mysqli_connect("$host", "$username", "$password")or die("cannot connect");
  mysqli_select_db($conn,"$db_name")or die("cannot select DB");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo '<table>'; // start a table tag in the HTML
$sql = "SELECT * FROM `user_last_transactions`";   
    $result = $conn->query($sql);

      if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) { //Creates a loop to loop through results
echo '<tr><td><span style="text-decoration: underline;color:black;"><b>' . $row["user_id"] . '</td><td><span style="text-decoration: underline;color:black;"><b>' . $row["transaction_type"] . '</td></b></span>  <td><button class="btnred" value='. $row["user_id"].' data-toggle="modal" data-target="#myModal">View Request</button></td></tr>';  //$row['index'] the index here is a field name
  }
      } else {
          echo "0 results";
      }

      $conn->close();


echo "</table>";
    ?>



    </div>

    
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>

</div>
</div>
</div>
<footer>
  <p>COPYRIGHT@SPARK_ENDEAVORS : ALL RIGHTS RESERVED</p>
</footer>

  
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">
            <Pre>

              <h1>&nbsp;&nbsp;&nbsp;<u>REQUEST DETAILS</u></h1>
              <table>
                <tr>                                  
4ub16cs052|&nbsp;Gagan|&nbsp;Syndicate bank|&nbsp;15000&nbsp;</tr>
<br>
<tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACCOUNT BALANCE : 154034</tr>
              </table>
 
            </Pre>

          </h4>
          <br>
          <br>
           <br>
          <br> <br>
        <!--   <br> <br>
          <br> <br>
          <br> -->

          </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <?php
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
            $_SESSION['usr_name']= $row['user_id'];
            header("Location:customer.php");
          }}}}
         ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ACCEPT</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">REJECT</button>
      
        </div>
        
      </div>



<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>
