<?php
include 'connection.php';

$searchQuery = isset($_POST['searchtxt']) ? mysqli_real_escape_string($conn, $_POST['searchtxt']) : '';

if ($searchQuery) {
    $query = "SELECT * FROM add_recipe WHERE recipe_name LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $query);
    $recipesFound = mysqli_num_rows($result);
} else {
    $recipesFound = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/media_queries_for_search_page.css">
    <script>
        function showRecipeNotFoundPopup() {
            alert('Recipe not found');
        }

        <?php if ($recipesFound == 0): ?>
            window.onload = function() {
                showRecipeNotFoundPopup();
            };
        <?php endif; ?>
    </script>
</head>
<body>
    <div class="container">
        <h1>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h1>
        <div class="card-row">
            <?php
            if ($recipesFound > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="recipe-card-design" data-name="' . $row['recipe_name'] . '">';
                    echo '<div class="recipe-img" style="background-image: url(' . $row['images'] . '); background-size: cover;"></div>';
                    echo '<div class="recipe-title"><p class="recipe_name">' . $row['recipe_name'] . '</p></div>';
                    echo '<div class="view-btn"><input type="button" class="view-recipe-btn" value="View Recipe"></div>';
                    echo '</div>';
                }
            } else {
                echo '<br><p>No recipes found.</p><br>';
            }
            ?>
        </div>
    </div>
    
</body>
<script>
    document.querySelectorAll(".recipe-card-design").forEach(card => {
            card.addEventListener("click", function () {
                const recipeName = card.getAttribute('data-name');
                window.location.href = `view_recipe.php?name=${encodeURIComponent(recipeName)}`;
            });
        });
</script>
</html>
