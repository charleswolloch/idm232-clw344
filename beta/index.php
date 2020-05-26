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



    <div class="redback">
        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Search">
            <a href="search.html"><img class="search-icon" src="images/search-icon.png"></a>
        </form>
    </div>

    <br>

    <form class="filter-container">
        <button type="button" class="button">All</button>
        <button type="button" class="button">Beef</button>
        <button type="button" class="button">Chicken</button>
        <button type="button" class="button">Pork</button>
        <button type="button" class="button">Fish</button>
        <button type="button" class="button">Vegetarian</button>

    </form>

    <!-- Help Button -->


    <a href="help.html"><button id="myBtn2">?</button></a>
    <a href="#top"><button id="myBtn">⇪</button></a>


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
