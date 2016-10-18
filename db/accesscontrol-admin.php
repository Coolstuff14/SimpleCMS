<?php

  session_start();

  // Test the session to see if is_auth flag was set (meaning they logged in successfully)
  // If test fails, send the user to login.php and prevent rest of page being shown.
  if (!isset($_SESSION['adminAuth'])) {
	header('location: ../login.php');
	exit;
}
?>
