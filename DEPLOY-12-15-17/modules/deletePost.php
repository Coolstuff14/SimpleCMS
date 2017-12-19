<?php
if(isset($_POST['deletepost']))
{
  include_once '../db/db.php';
  $blogid=$_POST['blogid'];
  dbcall("DELETE FROM blogposts WHERE blogID='".$blogid."'");
  unlink(''.$_SERVER["DOCUMENT_ROOT"].'/blogposts/p'.$blogid.'.html');
  header('Location: /projects');
}
 ?>
