<?php
// Step 1 Open a connection to DB
require 'include/db.php';

// Step 2 Perform a DB Table Query
$table = 'recipes';
$query = "SELECT * FROM {$table}";
$result = mysqli_query($connection, $query);

// Check for errors in SQL statement
if (!$result ) {
    die ('Database query failed');
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Just Another Cookbook Home Page</title>
    <meta charset="UTF-8">
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <meta name="HandheldFriendly" content="true">
        
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="master.css">

</head>


<!-- header -->
<header>
    <!-- Logo -->
    <a href="index.html" class="back">
        <img src="images/JAC_logo.png" class="logoresize"></a>
    <!-- search -->

</header>


<body>



    <div id="recipe_search">
        <form action="">
            <label for="search"></label>
            <input type="search" id="recipeSearch" name="recipeSearch" placeholder="Search">
            <button id="search" onclick="#">Go</button>
        </form>


    </div>
    <br>
    <form method="post">
        <fieldset>
            <legend>Filter</legend>
            <label><input type="radio" name="radio"> All</label>
            <label><input type="radio" name="radio"> Beef</label>
            <label><input type="radio" name="radio"> Chicken</label>
            <label><input type="radio" name="radio"> Pork</label>
            <label><input type="radio" name="radio"> Fish</label>
            <label><input type="radio" name="radio"> Vegetarian</label>
        </fieldset>
    </form>

    <!-- Help Button -->


    <a href="help.html"><button id="myBtn">?</button></a>


    <!-- gallery and tiles done w flex -->

    <div class="recipe_gallery">
        <!-- Tile is made of following: main img, title in h3, subtitle in h4 -->

        <?php
    while($row = mysqli_fetch_assoc($result)){
        ?>







        <div class="tile">
            <a href="recipe.html"><img src="graphics/<?php echo $row['main_img']; ?>" class="homeresize">

                <h3><?php echo $row['title']; ?></h3>
                <h4><?php echo $row['subtitle']; ?></h4>
            </a>
        </div>


        <?php
    } // end php while loop
    
    // Step 4 Release returned data
    mysqli_free_result($result);
    
    // Step 5  Close databse connection
    mysqli_close($connection);
    
    ?>


    </div>



</body>

<footer>
    <a href="index.html">Home</a>
    <a href="recipe.html">Recipe</a>
    <a href="help.html">Help</a>
    <a href="search.html">Search Results</a>
</footer>

</html>
