<?php
include_once 'db/db.php';
$rows = dbcall("SELECT blogID,user,title,datestamp FROM blogposts ORDER BY blogID DESC");
foreach ($rows as $row){
  $datestamp = date( "m-d-Y", strtotime($row['datestamp']));
echo '
  <!--Blog Post-->
  <li>
    <a href="/post.php?blogid='.$row['blogID'].'">
      <h2>'.$row['title'].'</h2>
      <p>~Posted on '.$datestamp.'</p>
    </a>
  </li>
';}
 ?>
