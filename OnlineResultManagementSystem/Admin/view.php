
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
 include 'db.php';
 $sql = "SELECT * FROM student";
 $result = mysqli_query($conn, $sql);
 $resultCheck = mysqli_num_rows($result);
 if ($resultCheck < 1) {
   header("Location: adhome.php?no data");
   exit();
 }

  ?>
<div style="min-height:82.1%;">
 <table width="600" border="1" cellpadding="1" cellspacing="1">
   <tr>
     <th>Name</th>
     <th>Roll No</th>
     <th>Marks</th>
     <th>All India Rank</th>
     <th>Category</th>
     <th>Category Rank</th>
   </tr>
<?php
while($student=mysqli_fetch_assoc($result)){
  echo "<tr>";
  echo "<td>&nbsp&nbsp&nbsp".$student['name']."</td>";
  echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$student['roll']."</td>";
  echo "<td>&nbsp&nbsp&nbsp".$student['marks']."</td>";
  echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$student['grank']."</td>";
  echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$student['category']."</td>";
  if($student['category']!='General'){
  echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$student['categoryrank']."</td>";
}else if($student['category']='General'){
  echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-</td>";
}
  echo "</tr>";
}
 ?>
 </table>
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
