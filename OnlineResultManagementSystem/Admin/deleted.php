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
  $roll= $_SESSION['roll'];
  include 'db.php';
  $sql = "DELETE FROM student WHERE student.roll='$roll'";
          mysqli_query($conn, $sql);
          $sql = "SELECT * FROM student";
          $result = mysqli_query($conn, $sql);
          while($student=mysqli_fetch_assoc($result)){
            $marks=$student['marks'];
            $roll=$student['roll'];
            $category=$student['category'];
            $sq="SELECT * FROM student WHERE marks>'$marks'";
            $res = mysqli_query($conn, $sq);
            $resCheck = mysqli_num_rows($res);
            $grank=$resCheck+1;

            $sqly="UPDATE student SET grank='$grank',categoryrank='$grank' WHERE roll='$roll' ";
                      mysqli_query($conn, $sqly);
            if($category!='General'){
              $sq="SELECT * FROM student WHERE marks>'$marks' AND category='$category'";
              $res = mysqli_query($conn, $sq);
              $resCheck = mysqli_num_rows($res);
              $crank=$resCheck+1;
              $sqly="UPDATE student SET categoryrank='$crank' WHERE roll='$roll' ";
                        mysqli_query($conn, $sqly);
            }

          }
}
  else {
  	header("Location: adlogin.php?error3");
  	exit();
  }
?>


        <h1>Data successfully deleted!!!</h1>
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
