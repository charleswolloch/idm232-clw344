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

        <div class="tile">
            <a href="recipe.html"><img src="images/1225_FPV_Pesto_-Broccoli-Sandwich_74916_WEB_SQ_hi_res.jpg" class="homeresize">

                <h3>Broccoli & Basil Pesto Sandwiches </h3>
                <h4>with Romaine & Citrus Salad</h4>
            </a>
        </div>

        <div class="tile">
            <a href="recipe.html"><img src="images/0101_FPP_Chicken-Rice_97338_WEB_SQ_hi_res.jpg" class="homeresize">
                <h3>Ancho-Orange Chicken</h3>
                <h4>with Kale Rice & Roasted Carrots</h4>
            </a>
        </div>

        <div class="tile">
            <a href="recipe.html"><img src="images/0101_2PM_Steak-Diane_97315_SQ_hi_res.jpg" class="homeresize">
                <h3>Beef Medallions & Mushroom Sauce</h3>
                <h4>with Mashed Potatoes</h4>
            </a>
        </div>

        <div class="tile">
            <a href="recipe.html"><img src="images/0101_FPV_Broccoli-Calzones_97286_WEB_SQ_hi_res.jpg" class="homeresize">
                <h3>Broccoli & Mozzarella Calzones</h3>
                <h4>with Caesar Salad</h4>
            </a>
        </div>

        <div class="tile">
            <a href="recipe.html"><img src="images/0101_2PV1_Broccoli-Bucatini-Fettuccine_97230_SQ_hi_res.jpg" class="homeresize">
                <h3>Bucatini Alfredo</h3>
                <h4>with Broccoli</h4>
            </a>
        </div>

        <div class="tile">
            <a href="recipe.html"><img src="images/1225_2PV1_Bucatini_100082_SQ_hi_res.jpg" class="homeresize">
                <h3>Bucatini & Tomato Sauce</h3>
                <h4>with Roasted Broccoli</h4>
            </a>
        </div>

    </div>



</body>

<footer>
    <a href="index.html">Home</a>
    <a href="recipe.html">Recipe</a>
    <a href="help.html">Help</a>
    <a href="search.html">Search Results</a>
</footer>

</html>
