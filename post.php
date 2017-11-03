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

  //NEW BLOG POST
  include_once 'db/db.php';
  $blogid = $_GET['blogid'];

  //Check for new post
  if($blogid=="newpost"){
    if($edtID=="edit"){

    $defTitle="EYYY A TITLE!";
    $defPic="img/tmp/home-bg.jpg";
    $user=$_SESSION['name'];

    dbcall("INSERT INTO blogposts (title,pic,user) VALUES ('$defTitle','$defPic','$user')");


    $rtrn = dbcall("SELECT blogID FROM blogposts WHERE datestamp = (SELECT MAX(datestamp) FROM blogposts)");
    if(($rtrn !== false)&&(count($rtrn) > 0)) {
      $blogid = $rtrn[0]['blogID'];
      $file = "blogposts\p".$blogid.".html";
      if (!copy('blogposts\new.html', $file)) {
        echo "failed to copy $file.n";
      }
      header("location: post.php?blogid=".$blogid."");
    }
  }else{
    header("Location: bloghome.php");
  }
}

  //Get info from database
  $rows = dbcall("SELECT title,user,pic,datestamp,tags FROM blogposts WHERE blogID=".$blogid."");
  if(($rows !== false)&&(count($rows) > 0)) {
    $fullname = $rows[0]['user'];
    $title = $rows[0]['title'];
    $datestamp = date( "m-d-Y", strtotime($rows[0]['datestamp']));
    $tags = $rows[0]['tags'];
    $headerpic = $rows[0]['pic'];
  }else{
    header("location: 404.php");
    die();
  }

  if(isset($_GET["blogid"])){
    $my_file = 'blogposts/p'.$blogid.'.html';
    $currentUrl = 'post.php?blogid='.$blogid;
    if(file_exists($my_file)){
      $handle = fopen($my_file, 'r');
      $content = fread($handle,filesize($my_file));
    }else{
      header("location: 404.php");
      die();
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$title?>">
    <meta name="author" content="<?=$fullname?>">

    <title><?=$title?></title>

    <!--Stylesheets-->
    <link href="bower\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet">
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="bower\Ionicons\css\ionicons.min.css" rel="stylesheet">
    <link href="css/login-modal.css" rel="stylesheet">

    <!--Custom Fonts-->
    <link href="bower\font-awesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!--Admin Needed CSS
        Only include if needed to save load time-->
    <?php if($edtID=="edit"){echo'
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css" media="screen" />
    ';}?>

</head>

<body>

    <!--Header Navbar-->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-left">
                  <li><a class="navbar-brand" href="bloghome.php"><i class="ion-arrow-left-c"></i> Home</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <!--Only include edit button in edit mode-->

                <?php if($edtID=="edit"){echo'
                <li><a class="navbar-brand" href="post.php?blogid=newpost"><i class="ion-compose"> New Post</i></a></li>
                <li><a class="navbar-brand btn iframe-btn" href="filemanager/filemanager/dialog.php?type=1&field_id=headerpic&relative_url=0"><i class="ion-ios-camera"> Edit Picture</i></a></li>
                <input hidden id="headerpic" type="text" value="" > <!--Used for filemanager to save chosen file to-->
                ';}?>
                <li><a class="navbar-brand" href="#">Next Post <i class="ion-arrow-right-c"></i></a></li>
              </ul>
            </div>
        </div>
    </nav>


    <!--Page Header-->
    <header class="intro-header" style="background-image: url('<?=$headerpic?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <div id="<?=$edtID?>"><h1 id="titletext"><?=$title?></h1></div>
                        <span class="meta">Posted by <?=$fullname?></a> on <?=$datestamp?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--Post Content-->
    <article>
        <div class="container" id="<?=$edtID?>">
            <?=$content?>
        </div>
    </article>
    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Jake Lee 2016</p>
                    <p class="copyright text-muted">
                      <?php
                        //Login button
                        if($edtID=="edit"){
                          echo "<a href='db/logout.php'>Logout</a></p>
                          <form method='POST' action='modules/deletePost.php'>
                          <input hidden type='text' name='blogid' value='".$blogid."'>
                          <button type='submit' name='deletepost' class='btn btn-danger'>Delete Post</button>
                          </form>
                          ";
                        }else{
                          echo "<a href='#' data-toggle='modal' data-target='#login-modal'>Login</a></p>";
                        }


                  ?>
                </div>
            </div>
        </div>
    </footer>

    <!--Login Modal-->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form method="POST" action="db/login.php">
					<input type="text" name="userName" id="userName" placeholder="Username">
					<input type="password" name="userPassword" id="userPassword" placeholder="Password">
					<input type="submit" name="loginSubmit" class="login loginmodal-submit" value="Login">
				  </form>
				</div>
			</div>
		  </div>

    <!--Required Javascript-->
    <script src="bower\jquery\dist\jquery.min.js"></script>
    <script src="bower\bootstrap\dist\js\bootstrap.min.js"></script>
    <script src="js/clean-blog.min.js"></script>

    <!--Admin Only Required Scripts
        Onyl Include if needed to save load time-->
    <?php if($edtID=="edit"){echo'
    <script type="text/javascript" src="fancybox/jquery.fancybox.js"></script>
    <script src="bower\tinymce\tinymce.min.js"></script>
    <script src="js\tinymce-page.js"></script>
    <script src="bootstrap-notify\bootstrap-notify.min.js"></script>
    ';}?>

</body>
</html>
