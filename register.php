
<!-- register.php -->
<?php

include 'connection.php';
if(isset($_POST["register"])){
    $name = $_POST["fullname"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $Pwd = $_POST["password"];

    

 $sql = "insert into users (full_name,mail,mobile,Pwd) Values
('$name','$email','$mobile','$Pwd')";
if(mysqli_query($conn,$sql)){
    echo "<script>
        alert('Registration completed successfully..');
        setTimeout(function() {
            window.location.href = 'http://localhost/Recipe%20Sharing%20Website/';
        }, 500);
    </script>";
}else{
    echo '<script>alert("error");</script>';
}


}

?>