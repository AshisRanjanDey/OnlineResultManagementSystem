
<?php

if (isset($_POST['submit'])) {

	include 'db.php';

	$aid = mysqli_real_escape_string($conn,$_POST['AID']);
	$pwd = mysqli_real_escape_string($conn,$_POST['PWD']);

	//Error handlers
	//Check if inputs are empty
	if (empty($aid) || empty($pwd)) {
		header("Location: adlogin.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM admin WHERE aid='$aid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: adlogin.php?wrong username");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {

				if ($row['pass']!= $pwd) {
					header("Location: adlogin.php?wrong password");
					exit();
				} else if($row['pass']== $pwd) {
					//Log in the user here
          session_start();
					$_SESSION['u_id'] = $row['aid'];
					header("Location: adhome.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: adlogin.php?login=error3");
	exit();
}
?>
