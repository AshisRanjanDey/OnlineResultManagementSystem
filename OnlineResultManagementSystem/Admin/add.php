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
<?php
session_start();
if (!isset($_SESSION['u_id'])) {
 header("Location: adlogin.php?must login");
 exit();
}
?>
<div style="min-height:82.1%;">
<form class="login" action="afteradd.php" method="POST">
<input type="text" name="name" placeholder="Name">
<input type="number" name="dob" placeholder="Date Of Birth(ddmmyyyy)">
<input type="number" name="marks" placeholder="Marks">
<select name="category">
   <option value="General">General</option>
   <option value="OBC">OBC</option>
   <option value="SC">SC</option>
   <option value="ST">ST</option>
 </select>
<button type="submit" name="submit">Add Result</button>
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
