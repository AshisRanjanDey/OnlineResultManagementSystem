<!DOCTYPE html>
<html>
<head>
	<title>Online Result Management System</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<header>

		<div class="main-wrapper">
                    <nav>
				<a class="home" href="../index.php">Home</a>
				<form class="logout" action="slogout.php" method="POST">
							<button type="submit" name="submit">Log Out</button>
						</form>
                    </nav>
	        </div>


</header>
<div style="min-height:82.1%;">
<?php
session_start();
if (!isset($_SESSION['roll'])) {
	header("Location: ../index.php?must login");
	exit();
}
?>
<div>
   <ul>
      <li><h2>Name : <?php echo $_SESSION['name']; ?></h2></li>
      <li><h2>Roll No : <?php echo $_SESSION['roll']; ?></h2></li>
      <li><h2>Marks : <?php echo $_SESSION['marks']; ?></h2></li>
			<li><h2>Category : <?php echo $_SESSION['category']; ?></h2></li>
      <li><h2>All India Rank : <?php echo $_SESSION['grank']; ?></h2></li>
			<?php if($_SESSION['category']!='General'){
			echo '<li><h2>'.$_SESSION['category'].' Rank : '.$_SESSION['crank'].'</h2></li>';
		}
		?>

   </ul>
</div>
</div>
<footer>
 <div >
   <nav>
     <a class="bot" href="dvl.php">Contact Us</a>
     <a class="bot" href="dvl.php">Developer</a>
   </nav>
</div>
</footer>
</body>
</html>
