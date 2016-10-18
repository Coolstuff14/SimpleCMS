<?php

//logout
session_start();
session_unset();
session_destroy();

// After logout, send them back to login.php
header("location: ../login.php");
exit;

 ?>
