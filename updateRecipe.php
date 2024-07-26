<?php
session_start();
if (isset($_SESSION["id_of_recipe"])) {
    $id = $_SESSION["id_of_recipe"];

    include 'connection.php';
    $sql = "SELECT * FROM add_recipe WHERE rid=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rname = $row["recipe_name"];
        $rdesc = $row["descriptions"];
        $ringredient = $row["ingredients"];
        $rprocess = $row["process"];
        $rimage = $row["images"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/recipe_modify.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Update Recipe</title>
</head>
<body>
    <div class="hero-section">
        <div class="heading">
            <p>Update Recipe</p>
            <input class="btn" type="button" name="log-out" value="Logout"/>
        </div>
        <div class="form">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="recipe-name">Recipe Name</label><br>
                <input type="text" name="recipename" placeholder="Enter Recipe name" value="<?php echo $rname; ?>" required/><br>
                <label for="recipe-description">Recipe Description</label><br>
                <textarea name="desc" cols="100" rows="5" required><?php echo $rdesc; ?></textarea><br>
                <label for="recipe-ingredients">Recipe Ingredients</label><br>
                <textarea name="ingre" cols="100" rows="10" required><?php echo $ringredient; ?></textarea><br>
                <label for="recipe-procedure">Procedure</label><br>
                <textarea name="process" cols="100" rows="10" required><?php echo $rprocess; ?></textarea><br>
                <input type="submit" class="btn" name="updaterecipe" value="Update Recipe"/>
            </form>
        </div>
    </div>

<?php
if (isset($_POST["updaterecipe"])) {
    $name = $_POST["recipename"];
    $desc = $_POST["desc"];
    $ingre = $_POST["ingre"];
    $method = $_POST["process"];
    $sql2 = "UPDATE add_recipe 
             SET recipe_name = '$name', 
                 descriptions = '$desc', 
                 ingredients = '$ingre', 
                 process = '$method'
             WHERE rid = '$id'";
    
    if (mysqli_query($conn, $sql2)) {
        echo "<script>
            alert('Record updated successfully');
            setTimeout(function() {
                window.location.href = 'http://localhost/Recipe%20Sharing%20Website/index_after_login.php';
            }, 2000);
        </script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

</body>
</html>

<?php
}
?>
