<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Recipe Sharing Website</title>
</head>

<body>
    <div class="container">
        <div class="header-section" style="background-image: url(recipe_img/header_img.jpeg);background-size: cover;">

            <div class="nav">
                <div class="logo">
                    <a href="index.html"><img src="logo-removebg-preview.png" alt="logo" width="100vw"></a>
                </div>
                <div class="nav-links" id="nav-links">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#category">Categories</a></li>
                        <li><a href="#recipe">Recipes</a></li>
                        <li><a href="#contact">Contact</a></li>

                    </ul>
                </div>
                <div class="login-btn">
                    <input class="btn"  type="button" name="submit-btn" value="Add Recipe" onclick="openpage()">
                   <a href="logout.php"> <input class="btn"  type="button" name="log-btn" value="Logout" ></a>
                </div>
                <div><h4 style="color:white"> <?php
                if (isset($_SESSION['email'])) {
                    echo $_SESSION['email'];
                } else {
                    echo "not set"; // or handle it in another appropriate way
                }
                ?>
                 </h4></div>
                 <div class="menu-icon" id="menu-icon">
                    &#9776;
                </div>
            </div>
         
            <div class="header-div">
                <h1>Discover Simple,<br>Delicious and <br><span>Fast Recipes..!</span></h1>
                <form action="search.php" method="POST">
                    <input  type="text"  id="search" class="search" placeholder="Search for recipes and foods"
                        name="searchtxt" required>
                    <input style="cursor:pointer;"class="search-btn" type="submit" name="s" value="search">
                </form>
                <div id="recipe-list"></div>

            </div>
            <!-- <div class="col-md-5">
                <div class="list-group" id="show-list">
                    <a href="#" class="list-group-item list-group-item-action">List1</a>
                </div>
            </div> -->


        </div>
        <div class="about-section" id="about">
            <div class="left" style="background-image: url(recipe_img/Bing.png);background-size: cover;"></div>
            <div class="right">
                <h2>About Us</h2>
                <p>

                    Welcome to<span> RecipeRendezvous</span>, the ultimate destination for food enthusiasts, home cooks,
                    and culinary
                    adventurers! Our platform is dedicated to bringing you a world of flavors, with recipes that range
                    from time-honored classics to innovative new dishes. Whether you're a seasoned chef or a kitchen
                    novice, you'll find something here to inspire your next meal.
                </p>
            </div>
        </div>
        <div class="category-section" id="category">
            <div class="heading">
                <p>Popular Categories</p>
            </div>
            <div class="category-item">
                <div class="div-design">
                    <div class="category-div item-1" style="  background-image: url(breakfast.jpeg);
    background-size: cover; "></div>
                    <p>Breakfast</p>
                </div>
                <div class="div-design">
                    <div class="category-div item-2" style=" background-image: url(lunch.jpeg);
                    background-size: cover; 
                    background-position: center;"></div>
                    <p>Lunch</p>
                </div>
                <div class="div-design">
                    <div class="category-div item-3" style="    background-image: url(dinner.jpeg);
    background-size: cover; "></div>
                    <p>Dinner</p>
                </div>
                <div class="div-design">
                    <div class="category-div item-4" style="  background-image: url(desserts.jpeg);
    background-size: cover; "></div>
                    <p>Desserts</p>
                </div>
            </div>

        </div>
        <div class="recipes-section" id="recipe">
            <div class="heading">
                <p>Super Delicious Recipes You Can't Miss</p>
            </div>
            <div class="card-row" > <!-- Moved this outside the loop -->
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM add_recipe";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="recipe-card-design" data-name="<?php echo $row['recipe_name']; ?>">
                        <div class="recipe-img"
                            style="background-image: url(<?php echo $row["images"]; ?>); background-size: cover;"></div>
                        <div class="recipe-title">
                            <p class="recipe_name"><?php echo $row["recipe_name"]; ?></p>
                            <!-- Dynamically display recipe name -->
                        </div>
                        <div class="view-btn">
                            <input type="button" class="view-recipe-btn" value="View Recipe">
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="get-in-touch-section" id="contact">
            <div class="get-in-touch-title">
                <p>Get in touch with us..!</p>
            </div>
            <div class="get-in-touch-div">
                <div class="map"><iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1891.7445734898515!2d73.79304237663743!3d18.506785027591953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bfb4b487ab0f%3A0xd815d13cf531599a!2sKothrud%20Depot!5e0!3m2!1sen!2sin!4v1720610623373!5m2!1sen!2sin"
                        width="1000" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                <div class="info">
                    <p>Address: 1234, Main Street, Anytown, CA 12345</p>
                    <p>Phone: 123-456-7890</p>
                    <p>Email:RecipeRendezvous@recipesite.com
                    <p>Contact us through:</p>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>

                </div>

            </div>
        </div>
        <div class="contact-us-section">
            <div class="contact-us-form-title">
                <p>Send us a message</p>
            </div>
            <div class="contact-us-form">
                <form action="contact.php" method="post">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="subject" placeholder="Subject" required>
                    <textarea name="message" placeholder="Message" required></textarea>
                    <input type="submit" id="submit-btn" name="submit" value="Submit">
                </form>
            </div>
        </div>
        <div class="footer">


            <div class="row" style=" padding: 1vw;">
                <div class="logo">
                    <a href="index.html"><img src="logo-removebg-preview.png" alt="logo" width="100vw"></a>
                </div>
                <!-- About Us Section -->
                <div class="footer-col">
                    <h4>About Us</h4>
                    <p>
                        Welcome to our recipe-sharing website, where you can find and share the best recipes from around
                        the world. Join our community and start cooking today!
                    </p>
                </div>
                <!--  Links Section -->
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul style=" list-style-type: none; padding: 0;">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <!-- Contact Information Section -->
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <p><i class="fas fa-envelope"></i> support@recipesite.com</p>
                    <p><i class="fas fa-phone"></i> +123-456-7890</p>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        123 Recipe Street, Food City, FC 12345
                    </p>
                    <h4 style="padding-bottom: 0.1vw;">Follow Us</h4>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            <hr style="border-top: 1px solid #444;">
            <div class="row">
                <div class="subfooter">
                    <p>&copy; 2024 Recipe Sharing Website. All Rights Reserved.</p>
                </div>
            </div>



        </div>
    </div>
    <script>
       
     



        function openpage() {
            window.location.href = "recipe_modify.php";
        }
        document.querySelectorAll(".recipe-card-design").forEach(card => {
            card.addEventListener("click", function () {
                const recipeName = card.getAttribute('data-name');
                window.location.href = `view_recipe.php?name=${encodeURIComponent(recipeName)}`;
            });
        });
       
        const menuicon=document.getElementById('menu-icon');
        const navlinks=document.getElementById('nav-links');
        menuicon.addEventListener('click',()=>{
            navlinks.classList.toggle('active');
        });
   
  

    </script>
</body>

</html>
