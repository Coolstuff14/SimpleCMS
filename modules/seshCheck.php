<?php
//If logged in allow editing
session_start();
if(isset($_SESSION['adminAuth'])){
  //Logged in
  $edtID = "edit";
}else{
  //Not logged in
  $edtID = "";
}
?>
