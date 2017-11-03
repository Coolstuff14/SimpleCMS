<?php
if(isset($_POST['deletepost']))
{
  include_once '../db/db.php';
  $blogid=$_POST['blogid'];
  dbcall("DELETE FROM blogposts WHERE blogID='".$blogid."'");
  unlink('../blogposts/p'.$blogid.'.html');
  header('Location: ../bloghome.php');
}
 ?>
