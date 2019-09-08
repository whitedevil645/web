<?php
session_start();
function destroySession() {
    
	// get session parameters 
    $params = session_get_cookie_params();
    
     // Delete the actual cookie. 
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    session_destroy();
}
if(isset($_SESSION['usr_name'])) {
	destroySession();
	// session_destroy();
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_name']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}
?>

