<?php
    $id = $_GET["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
          
    include "dbconn.php";

   // $sql = "delete from board where id='$id'";
   // mysqli_query($con, $sql);

    $sql = "delete from members where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);  
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);   
	
    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
