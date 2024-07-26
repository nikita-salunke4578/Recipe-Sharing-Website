<?php
session_start();
include 'connection.php';

if (isset($_POST["login"])) {
    $em = $_POST['mail'];
    $pwd = $_POST['password'];
    $sql = "SELECT * FROM users WHERE mail = '$em' AND Pwd = '$pwd' ";
   $data=mysqli_query($conn,$sql);
   $total=mysqli_num_rows($data);

   if($total==1){

    $_SESSION["email"]=$em;
    header("location:http://localhost/Recipe%20Sharing%20Website/index_after_login.php");

   }
   else{
    echo "<script>
        alert('Login failed...');
        setTimeout(function() {
            window.location.href = 'http://localhost/Recipe%20Sharing%20Website/';
        }, 500);
    </script>";
   }
   
}

