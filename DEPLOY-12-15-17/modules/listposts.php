<?php
//If logged in show drafts
include_once 'modules/seshCheck.php';
include_once 'db/db.php';
$rows = dbcall("SELECT blogID,user,title,datestamp,draft FROM blogposts ORDER BY blogID DESC");
foreach ($rows as $row){
  if($row['draft']==0){
    $datestamp = date( "m-d-Y", strtotime($row['datestamp']));
  echo '
    <!--Blog Post-->
    <li>
      <a href="../post?blogid='.$row['blogID'].'">
        <h2>'.$row['title'].'</h2>
        <p>~Posted on '.$datestamp.'</p>
      </a>
    </li>
  ';}elseif ($edtID=="edit") {
    //Show drafts if logged in
    $datestamp = date( "m-d-Y", strtotime($row['datestamp']));
  echo '
    <!--Blog Post-->
    <li>
      <a href="../post?blogid='.$row['blogID'].'">
        <h2>'.$row['title'].'</h2>
        <h3>*DRAFT*</h3>
        <p>~Posted on '.$datestamp.'</p>
      </a>
    </li>
  ';
  }
  }
 ?>
