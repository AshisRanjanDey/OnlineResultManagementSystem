<!DOCTYPE html>
<html>
<head>
	<title>Online Result Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>

		<div class="main-wrapper">
                    <nav>
				<a class="home" href="index.php">Home</a>
        <a class="adlog" href="Admin/adlogin.php">Admin Login</a>

                    </nav>
	        </div>


</header>
<div style="min-height:82.1%;">
<form class="login" action="Student/safterlogin.php" method="POST">
<input type="text" name="uid" placeholder="Roll No">
<input type="password" name="pass" placeholder="Date Of Birth(ddmmyyyy)">
<button type="submit" name="submit">Student Login</button>
</form>
</div>
<footer>
	<div >
		<nav>
			<a class="bot" href="Admin/dvl.php">Contact Us</a>
			<a class="bot" href="Admin/dvl.php">Developer</a>
		</nav>
</div>
</footer>
</body>
</html>
