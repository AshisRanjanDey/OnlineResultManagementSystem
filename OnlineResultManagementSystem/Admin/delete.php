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
?>
<h2>Put the roll no of the student to delete.</h2>
<form class="login" action="afterdelete.php" method="POST">
<input type="number" name="roll"  placeholder="Roll  No"?>
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
