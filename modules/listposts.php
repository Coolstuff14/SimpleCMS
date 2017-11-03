<?php
include_once 'db/db.php';
$rows = dbcall("SELECT blogID,user,title,datestamp FROM blogposts ORDER BY blogID DESC");
foreach ($rows as $row){
  $datestamp = date( "m-d-Y", strtotime($row['datestamp']));
echo '
  <!--Blog Post-->
  <div class="post-preview">
      <a href="post.php?blogid='.$row['blogID'].'">
          <h2 class="post-title">
              '.$row['title'].'
          </h2>
      </a>
      <p class="post-meta">Posted by '.$row['user'].'</a> on '.$datestamp.'</p>
  </div>
  <hr>
';}
 ?>
