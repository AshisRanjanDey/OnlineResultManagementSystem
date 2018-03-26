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
       <a class="adhome" href="adhome.php">Admin Home</a>
       <form class="logout" action="adlogout.php" method="POST">
             <button type="submit" name="submit">Log Out</button>
           </form>
                    </nav>
         </div>


</header>
<div style="min-height:82.1%;">
<?php
session_start();
if (!isset($_SESSION['u_id'])) {
 header("Location: adlogin.php?must login");
 exit();
}

if(isset($_POST['submit'])){

  include 'db.php';
  $roll = mysqli_real_escape_string($conn, $_POST['roll']);
  if (empty($roll)) {
     header("Location: delete.php?enter roll");
  }else {
    $sql = "SELECT * FROM student WHERE roll='$roll'";
    $result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: delete.php?no_records_found");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['name']=$row['name'];
        $_SESSION['roll']=$row['roll'];
        $_SESSION['marks']=$row['marks'];
        $_SESSION['grank']=$row['grank'];
        $_SESSION['category']=$row['category'];
        $_SESSION['crank']=$row['categoryrank'];
  }
}
}
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
<form class="login" action="deleted.php" method="POST">
  <button type="submit" name="submit">Delete Result</button>
</form>
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
