<?php
//Save blog post
include_once '../db/db.php';
if(isset($_POST['savepage']))
{
    //Save post to text file
    $htmlcont = $_POST['savepage'];
    $id = $_POST['blogid'];
    $title = $_POST['title'];
    //print($htmlcont);
    $file = "..\blogposts\p".$id.".html";
    file_put_contents($file, $htmlcont);
    dbcall("UPDATE blogposts SET title='".$title."' WHERE blogID='".$id."'");
}

if(isset($_POST['changehpic'])){
  $headerpic = $_POST['changehpic'];
  $id = $_POST['blogid'];
  dbcall("UPDATE blogposts SET pic='".$headerpic."' WHERE blogID='".$id."'");
}
?>
