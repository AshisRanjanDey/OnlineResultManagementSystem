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
  $_SESSION['roll']=$roll;
  if (empty($roll)) {
     header("Location: edit.php?enter roll");
  }else {
    $sql = "SELECT * FROM student WHERE roll='$roll'";
    $result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: edit.php?no_records_found");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
  }
}
}
}
?>
<form class="login" action="edited.php" method="POST">
<h2> Name</h2>
<input type="text" name="name" value=<?php echo $row['name'] ?>>
<h2> Date Of Birth(ddmmyyyy)</h2>
<input type="number" name="dob" value=<?php echo $row['dob'] ?>>
<h2> Marks</h2>
<input type="number" name="marks" value=<?php echo $row['marks'] ?>>
<h2> Category</h2>
<select name="category">
   <option value="General">General</option>
   <option value="OBC">OBC</option>
   <option value="SC">SC</option>
   <option value="ST">ST</option>
 </select>
 <button type="submit" name="submit">Edit Result</button>
 </form>
</div>
  <footer>
 <div>
   <nav>
     <a class="bot" href="dvl.php">Contact Us</a>
     <a class="bot" href="dvl.php">Developer</a>
   </nav>
</div>
</footer>
</body>
</html>
