<?php
// Step 1 Open a connection to DB
require 'include/db.php';

?>




<!DOCTYPE html>
<html>

<head>
    <title>Just Another Cookbook Recipe Page</title>
    <meta charset="UTF-8">
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <meta name="HandheldFriendly" content="true">
        
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="master.css">

</head>

<header>
    <a href="index.php" class="back">
        <img src="images/JAC_logo.png" class="logoresize"></a>

    <a href="index.php" class="back">
        <img src="images/back_button.svg" class="backbutton"></a>

</header>

<body>

    <?php 
    
    // get id number passed to this page
   $id = $_GET['id'];
    
    //query for said id number
    // Step 2 Perform a DB Table Query
    $table = 'recipes';
    $query = "SELECT * FROM {$table} WHERE id={$id}";
    $result = mysqli_query($connection, $query);

    // Check for errors in SQL statement
    if (!$result ) {
        die ('Database query failed');
    } else {
        $row = mysqli_fetch_assoc($result);
    }
    
    //extract record information
    

    ?>



    <div class="recipe_header">
        <div class="cropped">
            <img src="graphics/<?php echo $row['main_img']; ?>" class="headerimg">
        </div>
        <h1> <?php echo $row['title']; ?> </h1>
        <h2><?php echo $row['subtitle']; ?></h2>

        <p><?php echo $row['description']; ?></p>

    </div>

    <hr>

    <div class="ingredients_parent">
        <ul class="ingredients_child">

            <?php 
            $ingredStr = $row['all_ingredients'];
            // echo $ingredStr;
            
            // Convert string into an array
            $ingredArray = explode("*", $ingredStr);
            
            
            for($lp = 0; $lp < count($ingredArray); $lp++) {
                $oneIngred = $ingredArray[$lp];
                echo "<li>" . $oneIngred . "</li>";
            }
            
            ?>

        </ul>

        <img src="graphics/<?php echo $row['ingredients_img']; ?>" class="ingredients_child ing_img">
    </div>

    <br>
    <hr>
    <br>

    <!-- Step 1 -->

    <?php 
            $stepImgs = $row['step_imgs'];
            $allSteps = $row['all_steps'];
            $allHeaders = $row['all_steps'];
    
            
            // Convert string into an array
        // all step array has twice as much lines as all images array
            $stepImgsArray = explode("*", $stepImgs);
    
            $allStepsArray = explode("*", $allSteps);
    
            $allHeadersArray = explode("*", $allHeaders);
            
            
            for($i = 0; $i < count($stepImgsArray); $i++){
                $oneImg = $stepImgsArray[$i];
                $oneStep = $allStepsArray[$i*2+1];
                $oneHeader = $allHeadersArray[$i*2];
               // echo $oneImg . "<br>";
                echo "<div class=\"step_parent\">";
                echo "<img src=\"graphics/" . $oneImg . "\" class=\"step_child step_img\">";
                
                echo "<div class=\"step_child step_childtxt\">";
                
                echo "<h4> $oneHeader </h4>";
                echo "<p> $oneStep </p>";
                
                echo "</div>";
                
                echo "</div>";
                
    }


    ?>

    <!--
    <div class="step_parent">
        <img src="graphics/1225_FPV_Pesto-Broccoli-Sandwich_18814_WEB_retina_feature.jpg" class="step_child step_img">

        <div class="step_child step_childtxt">
            <h4> 1 Prepare the ingredients & season the tomato sauce:</h4>
            <p>Place an oven rack in the center of the oven, then preheat to 475°F. Wash and dry the fresh produce. Cut off and discard the bottom 1/2 inch of the <strong>broccoli</strong> stem; cut the broccoli into small pieces, keeping the florets intact. Peel and roughly chop the <strong>garlic.</strong> Halve the <strong>focaccia.</strong> Grate the <strong>asiago cheese</strong> on the large side of a box grater. Tear the <strong>mozzarella cheese</strong> into small pieces. In a bowl, combine the <strong>tomato sauce</strong> and <strong>Italian seasoning;</strong> season with salt and pepper to taste. </p>

        </div>

    </div>


-->


</body>

</html>
