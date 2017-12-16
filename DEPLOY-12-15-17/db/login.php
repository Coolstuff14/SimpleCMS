<?php
	// First start a session. This should be right at the top of your login page.
	session_start();

	// Check to see if this run of the script was caused by our login submit button being clicked.
	if (isset($_POST['loginSubmit'])) {

    include_once 'db.php';
		// Also check that our email address and password were passed along. If not, jump
		// down to our error message about providing both pieces of information.
try{
		if (isset($_POST['userName']) && isset($_POST['userPassword'])) {
			$userN = $_POST['userName'];
			$pass = $_POST['userPassword'];

			//Check for valid entry or else login will occurr due to error
			if ($userN == "" || $pass==""){
				throw new Exception('No Username or Password');
			}else{


      $rows = dbcall("SELECT uid,username,password,fullname FROM user WHERE username='".$userN."' ");
        	if($rows[0]['password'] == $pass){
							//Redirect to admin portal
							$_SESSION['adminAuth'] = 'true';
							$_SESSION['uId'] = $rows[0]['uid'];
							$_SESSION['name'] = $rows[0]['fullname'];

							// Once the sessions variables have been set, redirect them to the landing page / home page.
							header('Location: ' . $_SERVER['HTTP_REFERER']);
		          exit;

					}else{
						throw new Exception('Username or Password Incorrect');

			}}}else {
				throw new Exception('Username Error!');
		}

}catch(Exception $e){
	$error = $e->getMessage();
	$_SESSION['error'] = $error;
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}
}

?>
