<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='index.php';alert('You must be logged in to view this page.');</script>";
    exit();
}


include 'connection.php';

if (isset($_GET['name'])) {
    $recipeName = mysqli_real_escape_string($conn, $_GET['name']);
} else {
    $recipeName = "Unknown Recipe";
}

// Query to get the recipe details
$query = "SELECT * FROM add_recipe WHERE recipe_name='$recipeName'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id=$row['rid'];
        $rimage = $row['images'];
        $rName = $row['recipe_name'];
        $rDescription = $row['descriptions'];
        $rIngredients = $row['ingredients'];
        $rInstructions = $row['process'];
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/media_queries.css">
            <title>View Recipe</title>
        </head>

        <body>
            <div class="container-recipe">
                <div class="main_img" style="background-image: url(explore_recipe_img.jpeg)"></div>
                <div class="recipe-section">
                    <div class="recipe_img" style="background-image:url(<?php echo $rimage; ?>);"></div>
                    <div class="recipe_title">

                        <h1><?php echo htmlspecialchars($rName); ?></h1>

                        <p><?php echo nl2br(htmlspecialchars($rDescription)); ?></p>
                        <div style="padding: 2vw;">
                            <input type="button" class="btn" value="Update Recipe" id="update"
                                style="border: 2px solid #973131;" />
                            <input type="button" class="btn" value="Delete Recipe" id="delete"
                                style="border: 2px solid #973131;" />
                            <input type="button" class="btn" value="Share Recipe" id="share"
                                style="border: 2px solid #973131;" />
                        </div>
                    </div>
                </div>
                <div class="ingredient">
                    <h2>Ingredients</h2>
                    <ul>
                        <?php
                        $ingredients = explode("\n", $rIngredients);
                        foreach ($ingredients as $ingredient) {
                            echo "<li>" . htmlspecialchars($ingredient) . "</li>";
                    
                        }
                        ?>
                    </ul>
                </div>
                <div class="procedure">
                    <h2>Procedure</h2>
                    <p><?php echo nl2br(htmlspecialchars($rInstructions)); ?></p>
                </div>

            </div>
            <?php
        
            $_SESSION["id_of_recipe"]=$id;       
    }
            ?>
            <script>
                document.getElementById('share').addEventListener('click', async () => {
                    const title = '<?php echo htmlspecialchars($rName); ?>';
                    const text = `<?php echo htmlspecialchars($rDescription); ?>\n\nIngredients:\n<?php echo htmlspecialchars($rIngredients); ?>\n\nProcedure:\n<?php echo htmlspecialchars($rInstructions); ?>`;
                    const url = window.location.href;

                    if (navigator.share) {
                        try {
                            await navigator.share({
                                title: title,
                                text: text,
                                url: url
                            });
                            console.log('Recipe shared successfully');
                        } catch (error) {
                            console.error('Error sharing recipe:', error);
                        }
                    } else {
                        alert('Web Share API not supported in this browser.');
                    }
                });
                document.getElementById('update').addEventListener('click', function () {

                    window.location.href = `updateRecipe.php`;

                });
                document.getElementById('delete').addEventListener('click', function () {
                    if (confirm('Are you sure you want to delete this recipe?')) {
                        window.location.href = `deleteRecipe.php`;
                    }
                });
            </script>
        </body>

        </html>

        <?php
    }
else {
    echo "Recipe not found.";
}
?>