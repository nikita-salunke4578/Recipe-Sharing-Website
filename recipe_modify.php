<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/recipe_modify.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <title>Modify Recipe</title>
</head>
<body>
  
    <div class="hero-section">
        <div class="heading">
            <p>Add New Recipe</p>
         <a href="logout.php">  <input class="btn" type="button" name="log-out" value="Logout"/></a> 
        </div>
        <div class="form">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <label for="recipe-name">Recipe Name</label><br>
                <input type="text" name="recipename"  placeholder="Enter Recipe name" required/><br>
                <label for="recipe-description">Recipe Description</lab><br>
                <textarea name="desc" cols="100" rows="5" placeholder="Enter recipe description" required></textarea><br>
                <label for="recipe-ingredients">Recipe Ingredients</label><br>
                <textarea name="ingre" cols="100" rows="10" placeholder="Enter recipe ingredients"required></textarea><br>
                <label for="recipe-procedure">Procedure</label><br>
                <textarea name="process" cols="100" rows="10" placeholder="Enter recipe procedure" required></textarea><br>
                <label for="recipe-image">Recipe Image</label><br>
                <input type="file" name="img" required><br>
                <input type="submit" class="btn" name="addrecipe" value="Add New Recipe"/>
            </form>
        </div>
    </div>
</body>
</html>
