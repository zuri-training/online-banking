<?php 

echo "<script>alert('You have successfully logged out')</script>";
    session_start();
    session_unset();

  

    header("location: index.php");
   
?>