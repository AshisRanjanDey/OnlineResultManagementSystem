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

  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $marks = mysqli_real_escape_string($conn, $_POST['marks']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);


  if(empty($name)||empty($dob)||empty($marks)||empty($category)){

    header("Location: edit.php?form=empty");
  exit();

  }else{
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    header("Location: edit.php?invalid name");
    exit();
  }else{
    $oroll=mysqli_real_escape_string($conn, $_SESSION['roll']);
$sqly="UPDATE student SET name='$name' , dob='$dob', marks='$marks' , category='$category' WHERE roll='$oroll' ";
          mysqli_query($conn, $sqly);
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
  }
  }
?>
<h1>Data successfully edited!!!</h1>
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
