<?php
session_start();
$id = $_SESSION["id_of_recipe"];
include 'connection.php';

$sql = "DELETE FROM add_recipe WHERE rid=$id";
if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Recipe deleted successfully..');
        setTimeout(function() {
            window.location.href = 'http://localhost/Recipe%20Sharing%20Website/index_after_login.php';
        }, 500);
    </script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
