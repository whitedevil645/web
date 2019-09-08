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

