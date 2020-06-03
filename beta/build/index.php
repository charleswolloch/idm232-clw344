<?php
// Step 1 Open a connection to DB
require 'include/db.php';
$table = 'recipes';

// Get filter info if passed in URL
$filter = $_GET['filter'];


if(isset($_POST['submit'])) {
    // echo "User Clicked Submit"; 

    $search = $_POST['search'];
    $query = "SELECT * FROM {$table} WHERE title LIKE '%{$search}%' OR subtitle LIKE '%{$search}%' ";
    $result = mysqli_query($connection, $query);

    if (!$result ) {
    die ('Search query failed');
}

    
    
    
} else if (isset($filter)) {

    $query = "SELECT * FROM {$table} WHERE proteine LIKE '%{$filter}%'";
    $result = mysqli_query($connection, $query);
    
    if (!$result ) {
    die ('Filter query failed');
}


} else {
    // Step 2 Perform a DB Table Query
$query = "SELECT * FROM {$table}";
$result = mysqli_query($connection, $query);

// Check for errors in SQL statement
if (!$result ) {
    die ('Database query failed');
}
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
    <a href="index.php" class="back">
        <img src="images/JAC_logo.png" class="logoresize"></a>
    <!-- search -->

</header>


<body>



    <div class="redback">
        <form class="search-container" action="index.php" method="POST">
            <input type="text" id="search-bar" placeholder="Search" name="search">
            <button type="submit" name="submit" value="submit" class="search-icon">Submit</button>
        </form>
    </div>

    <br>

    <form class="filter-container">
        <a href="index.php" class="filter"><button type="button" class="button">All</button></a>
        <a href="index.php?filter=Beef" class="filter"><button type="button" class="button">Beef</button></a>
        <a href="index.php?filter=Chicken" class="filter"><button type="button" class="button">Chicken</button></a>
        <a href="index.php?filter=Pork" class="filter"><button type="button" class="button">Pork</button></a>
        <a href="index.php?filter=Fish" class="filter"><button type="button" class="button">Fish</button></a>
        <a href="index.php?filter=Vegitarian" class="filter"><button type="button" class="button">Vegitarian</button></a>

    </form>

    <!-- Help Button -->


    <a href="help.html"><button id="myBtn2">?</button></a>
    <a href="#top"><button id="myBtn">⇪</button></a>

    <!-- gallery and tiles done w flex -->
    <div class="allrecipe">
        <?php 
        if (isset($_POST['submit'])) {
            if ($result->num_rows == 0) {
                echo "<h2 class=\"allrecipe\">No Recipes Found</h2>";
            } else {
                echo "<h2 class=\"allrecipe\">Search Results:</h2>";
            }
            

        } else if (isset($filter)) {
            echo "<h2 class=\"allrecipe\">Filter Results:</h2>";
            
            
        } else {
        echo "<h2 class=\"allrecipe\">All Recipes</h2>";

        }
        
        
        ?>
    </div>

    <div class="recipe_gallery">
        <!-- Tile is made of following: main img, title in h3, subtitle in h4 -->

        <?php
    while($row = mysqli_fetch_assoc($result)){
        ?>







        <div class="tile">
            <!-- <a href="recipe.php"> -->
            <?php
                $id = $row['id'];
        
                echo "<a href=\"recipe.php?id={$id}\">";

            ?>

            <img src="graphics/<?php echo $row['main_img']; ?>" class="homeresize">

            <h3><?php echo $row['title']; ?></h3>
            <h4><?php echo $row['subtitle']; ?></h4>
            <?php echo "</a>" ?>
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


</html>
