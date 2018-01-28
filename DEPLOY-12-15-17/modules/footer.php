<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p class="copyright text-muted">Copyright &copy; Jake Lee 2017</p>
                <p class="copyright text-muted">
                  <?php
                    //Login button
                    if($edtID=="edit"){
                      echo "<a href='/db/logout.php'>Logout</a></p>";
                    }else{
                      echo "<a href='#' data-toggle='modal' data-target='#login-modal'>Login</a></p>";
                    }?>
            </p>
            </div>
        </div>
    </div>
</footer>

<!--Login Modal-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="loginmodal-container">
      <h1>Login to Your Account</h1><br>
      <form method="POST" action="../db/login.php">
      <input type="text" name="userName" id="userName" placeholder="Username">
      <input type="password" name="userPassword" id="userPassword" placeholder="Password">
      <input type="submit" name="loginSubmit" class="login loginmodal-submit" value="Login">
      </form>
    </div>
  </div>
  </div>
<!--END FOOTER-->
