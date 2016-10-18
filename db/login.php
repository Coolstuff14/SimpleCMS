<?php
	// First start a session. This should be right at the top of your login page.
	session_start();

	// Check to see if this run of the script was caused by our login submit button being clicked.
	if (isset($_POST['loginSubmit'])) {

    include_once 'mysql.php';
		// Also check that our email address and password were passed along. If not, jump
		// down to our error message about providing both pieces of information.
		if (isset($_POST['userName']) && isset($_POST['userPassword'])) {
			$userN = $_POST['userName'];
			$pass = $_POST['userPassword'];


      // Connect to the database
      $connection = db_connect();

      $rows = db_select("SELECT uid,username,password,fullname FROM user WHERE username='".$userN."' ");
      if(($rows !== false)&&(count($rows) > 0)) {
        	if($rows[0]['password'] == $pass){
							//Redirect to admin portal
							$_SESSION['adminAuth'] = 'true';
							$_SESSION['uId'] = $rows[0]['uid'];
							$_SESSION['name'] = $rows[0]['fullname'];

							// Once the sessions variables have been set, redirect them to the landing page / home page.
							header('location: ../admin.php');
		          exit;

					}else{
						$error = "Password compare issue";
					}
			}
			else {
				$error = "Database query issue or bad username ";
			}
		}
		else {
			$error = "Username and password not grabbed.";
		}
	}

?>
<?=$error?>
