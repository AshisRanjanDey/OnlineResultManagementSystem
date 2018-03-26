<?php

if (isset($_POST['submit'])) {
	session_start();
	session_unset();
	session_destroy();
	header("Location: adlogin.php");
	exit();
}else {
	header("Location: ../index.php?login=error3");
	exit();
}

?>
