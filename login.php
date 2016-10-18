<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Login</title>

  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="bower\bootstrap\dist\css\bootstrap.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-offset-8 col-md-3">
            <div class="form-login">
              <form method="POST" action="db/login.php">
            <h4>Welcome back.</h4>
            <input type="text" name="userName" id="userName" class="form-control input-sm chat-input" placeholder="username" />
            </br>
            <input type="password" name="userPassword" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
            </br>
            <div class="wrapper">
            <span class="group-btn">
              <button type="submit" name="loginSubmit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
            </span>
          </form>
            </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
