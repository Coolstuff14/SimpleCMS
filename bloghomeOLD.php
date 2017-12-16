<?php
//If logged in allow editing
include_once 'modules/seshCheck.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A collection of fun and interesting">
    <meta name="author" content="Jake Lee">

    <title>Jake's Blog</title>

    <!--The CSS-->
    <link href="bower\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet">
    <link href="css/bloghome.css" rel="stylesheet">
    <link href="bower\font-awesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="bower\Ionicons\css\ionicons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="css/modals.css" rel="stylesheet">

</head>
<body>

  <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
      <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a class="navbar-brand" href="bloghome.php">Jake's Blog</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            </ul>
            <form class="navbar-form pull-right search-box">
              <input type="text" class="transparent-input" placeholder="Search" />
              <label for="mySubmit"><i class="ion-search"></i></label>
              <input id="mySubmit" type="submit" value="Go" class="hidden" />
            </form>

              </form>
          </div>
      </div>
  </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/tmp/html-programming.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Jake's Blog</h1>
                        <hr class="medium">
                        <span class="subheading">A collection of fun and interesting</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                <?php include 'modules/listposts.php';?>

                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

<?php include_once 'modules/footer.php';?>

    <!--The Javascript-->
    <script src="bower\jquery\dist\jquery.min.js"></script>
    <script src="bower\bootstrap\dist\js\bootstrap.min.js"></script>
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
