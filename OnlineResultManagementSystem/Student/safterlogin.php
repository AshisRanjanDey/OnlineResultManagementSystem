
<?php


if (isset($_POST['submit'])) {

	include '../Admin/db.php';

	$uid =  mysqli_real_escape_string($conn,$_POST['uid']);
	$pass =  mysqli_real_escape_string($conn,$_POST['pass']);

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pass)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM student WHERE roll='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?wrong username");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {

				if ($row['dob']!= $pass) {
					header("Location: ../index.php?wrong password");
					exit();
				} else if($row['dob']== $pass){
					//Log in the user here
					session_start();
					$_SESSION['roll'] = $row['roll'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['dob'] = $row['dob'];
          $_SESSION['marks'] = $row['marks'];
          $_SESSION['grank'] = $row['grank'];
					$_SESSION['category'] = $row['category'];
					$_SESSION['crank'] = $row['categoryrank'];
					header("Location: shome.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error3");
	exit();
}
?>
