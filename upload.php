<?php 
include 'connection.php';

$rname = $_POST['recipename'];
$rdesc = $_POST['desc'];
$ringredient = $_POST['ingre'];
$rprocess = $_POST['process'];

// Handle file upload
$filename = $_FILES["img"]["name"];
$temp = $_FILES["img"]["tmp_name"];
$folder = "images/" . basename($filename); 

if (move_uploaded_file($temp, $folder)) {
    if ($conn) {
        $sql = "INSERT INTO add_recipe(recipe_name, descriptions, ingredients, process, images) 
                VALUES ('$rname', '$rdesc', '$ringredient', '$rprocess', '$folder')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Recipe Added');</script>";
            header("Location: http://localhost/Recipe%20Sharing%20Website/#recipe");
            exit(); // Always exit after redirecting
        } else {
            echo "<script>alert('Failed to add recipe');</script>";
        }
    } else {
        echo "<script>alert('Connection not established');</script>";
    }
} else {
    echo "<script>alert('Failed to upload image');</script>";
}

mysqli_close($conn);
?>
