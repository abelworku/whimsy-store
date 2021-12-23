<?php 
    session_start();
?>

<?php 

include '../PHP/config.php';

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

$connectionError = mysqli_connect_error(); 
if ($connectionError != null) { 
    $output = "<p>Detected an error. Not able to connect to the database</p>" . $connectionError;
    exit($output); 
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shop | Whimsy</title> 
        
<!--        Links to Bootstrap Framework -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
        
        <link href="https://fonts.googleapis.com/css?family=Prata&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

        <link href="../CSS/general.css" rel="stylesheet">
        <link href="../CSS/shop.css" rel="stylesheet">
<!--        <script type="text/javascript" src="../JavaScript/script.js"></script>-->
        
        <style>
            <?php include('../CSS/general.css') ?>
            <?php include('../CSS/shop.css') ?>
        </style> 
        
    </head>

    <body class="bg-light">
        <div class="container-fluid bg-white">
            
            <?php include '../PHP/header.php';?>
            
            <div class="mainContainer">                
                
                <!--Search form-->
                <form class="mb-4" style="padding-left: 10%; padding-right: 10%;">
                    <div class="form-row mb-3">
                        <div class="col-sm-12 col-md-4">
                            <h1 class="display-4 text-center">Category</h1>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <h1 class="display-4 text-center">Price</h1>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <h1 class="display-4 text-center">Rating</h1>
                        </div>
                        
                    </div>
                    
                    <div class="form-row mb-3">
                        <div class="col-sm-12 col-md-4">
                            <select class="custom-select" name="category">
                                <option selected value='0'>All Categories</option>

                                <?php  
                                    $sql = "
                                    SELECT CategoryID, CategoryName 
                                    FROM Category
                                    ";

                                    if ($result = mysqli_query($connection, $sql)) { 

                                        while ($row = mysqli_fetch_assoc($result)) { 
                                            echo "<option value='" . $row['CategoryID'] . "'>" . $row['CategoryName'] . "</option>";
                                        }

                                    } 


                                ?>

                            </select>
                        </div>
                        
                        <div class="col-sm-12 col-md-4"> 
                            <select class="custom-select" name="price">
                                <option selected value='0'>All Prices</option>
                                <option value='1'>Under $50</option>
                                <option value='2'>$50 to $150</option>
                                <option value='3'>$150 to $500</option>
                            
                            </select>
                            
                        </div>
                        
                        <div class="col-sm-12 col-md-4">
                            <select class="custom-select" name="rating">
                                <option selected value='0'>All Ratings</option>
                                <option value='1'>2 Stars &amp; Below</option>
                                <option value='2'>3 Stars &amp; Above</option>
                                <option value='3'>4 Stars &amp; Above</option>
                            
                            </select>                            
                        </div>    
                    </div>
                    
                    <div class="form-row text-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg font-weight-light mt-4 px-4 py-2">Search</button>
                        </div>
                        
                    </div>

                </form> <!-- Search form --> 
                
                <div class="border-top mb-5 mt-5 ml-5 mr-5"></div>

               
                <div class="px-5">
                
                    
                    <!--Product List -->
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">

                        <?php

                        if (empty($_GET['category']) && empty($_GET['price']) && empty($_GET['rating'])) { 
                            //Look for all products with no specification, for category, price, and rating 
                            
                            $sql = "
                                SELECT Name, Description, ImageFileName, Price, ProductID
                                FROM Products
                                LIMIT 50
                            ";

                            if ($result = mysqli_query($connection, $sql)) { 
                                while ($row = mysqli_fetch_assoc($result)) { 
                                ?>
                                <div class="col mb-4">
                                    <div class="card shopCard">
                                        <a href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>">
                                            <img src="../Images/shop/<?php echo $row['ImageFileName'];      /* ImageFileName */     ?>.jpg" class="card-img-top">
                                        </a>
                                        
                                        <div class="card-body">
                                            
                                            <h5 class="card-title">
                                                <a href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>" id="shopTitleLink">
                                                    <?php echo $row['Name'];     /* Name */   ?>
                                                </a>
                                            </h5>
                                            
                                            <h6 class="card-subtitle mb-2 text-muted">CDN $<?php echo $row['Price'];     /* Price */   ?></h6>

                                            <p class="card-text text-truncate"><?php echo $row['Description'];    /* Description */   ?></p>

                                            <div class="text-center">
                                                <a class="btn btn-light btn-outline-dark mb-1" href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>">
                                                    Shop
                                                </a>

                                                <button type="button" 
                                                        data-toggle="popover" 
                                                        data-trigger="focus" 
                                                        title="Success!" 
                                                        data-content="This item has just been added to your wish list." 
                                                        data-placement="top" 
                                                        class="btn btn-light btn-outline-dark mb-1 addToWishListButton"
                                                        href="<?php echo $row['ProductID']; ?>">
                                                        Add to Wish List
                                                </button>

                                                <button type="button" 
                                                        data-toggle="popover" 
                                                        data-trigger="focus" 
                                                        title="Success!" 
                                                        data-content="This item has just been added to your cart. We can't wait for you to enjoy it soon!" 
                                                        data-placement="top"
                                                        class="btn btn-light btn-outline-dark mb-1 addToCartButton"
                                                        href="<?php echo $row['ProductID']; ?>">
                                                        Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php 
                                }
                            }
                        }
                        ?> 
                        
                        <?php 
                        
                            if ($_SERVER['REQUEST_METHOD'] == "GET") { 
                                
                                if (!empty($_GET['category']) && empty($_GET['price']) && empty($_GET['rating'])) {
                                    //Look for all products with given category 
                                    
                                    $categoryID = $_GET['category']; 
                                    
                                    $sql = "
                                    SELECT Name, Description, ImageFileName, Price, Products.ProductID
                                    FROM Products 
                                    INNER JOIN Category ON Products.CategoryID = Category.CategoryID
                                    WHERE Category.CategoryID = ?
                                    LIMIT 50
                                    "; 
                                    
                                    $statement = mysqli_prepare($connection, $sql); 
                                    mysqli_stmt_bind_param($statement, 'i', $categoryID); 
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement); 
                                    
                                } else if (empty($_GET['category']) && !empty($_GET['price']) && empty($_GET['rating'])) {
                                    //Look for all products with given price 
                                    
                                    $priceRangeID = $_GET['price']; 
                                    
                                    if ($priceRangeID == '1') { 
                                        //Look for all products with price less than $50 
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, ProductID
                                        FROM Products 
                                        WHERE Price < 50.00 
                                        LIMIT 50
                                        "; 
//                                        $statement = mysqli_prepare($connection, $sql); 
////                                        mysqli_stmt_bind_param($statement, 'i', $categoryID); 
//                                        mysqli_stmt_execute($statement);
//                                        $result = mysqli_stmt_get_result($statement); 
                                        
                                    } else if ($priceRangeID == '2') { 
                                        //Look for all products with price between $50 to $150
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, ProductID
                                        FROM Products 
                                        WHERE Price BETWEEN 50.00 AND 150.00  
                                        LIMIT 50
                                        "; 
                                    
                                    } else if ($priceRangeID == '3') { 
                                        //Look for all products with price between $150 to $500 
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, ProductID
                                        FROM Products 
                                        WHERE Price BETWEEN 150.00 AND 500.00  
                                        LIMIT 50
                                        ";                                         
                                    
                                    }
                                    
                                    
                                    $statement = mysqli_prepare($connection, $sql); 
//                                        mysqli_stmt_bind_param($statement, 'i', $categoryID); 
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement); 
                                    
                                                                        
                                } else if (empty($_GET['category']) && empty($_GET['price']) && !empty($_GET['rating'])) {
                                    //Look for all products with given rating 
                                    
                                    $ratingRangeID = $_GET['rating']; 
                                    
                                    if ($ratingRangeID == '1') { 
                                        //Look for all products with rating < 3 
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID
                                        GROUP BY Name
                                        HAVING (AvgRating < 3)                                        
                                        LIMIT 50
                                        "; 
//                                        $statement = mysqli_prepare($connection, $sql); 
////                                        mysqli_stmt_bind_param($statement, 'i', $categoryID); 
//                                        mysqli_stmt_execute($statement);
//                                        $result = mysqli_stmt_get_result($statement); 
                                        
                                    } else if ($ratingRangeID == '2') { 
                                        //Look for all products with rating at least 3  
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID
                                        GROUP BY Name
                                        HAVING (AvgRating >= 3)                                        
                                        LIMIT 50                                        
                                        "; 
                                    
                                    } else if ($ratingRangeID == '3') { 
                                        //Look for all products with rating at least 4 
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID
                                        GROUP BY Name
                                        HAVING (AvgRating >= 4)
                                        LIMIT 50 
                                        ";                                         
                                    
                                    }
                                    
                                    
                                    $statement = mysqli_prepare($connection, $sql); 
//                                        mysqli_stmt_bind_param($statement, 'i', $categoryID); 
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement); 

                                    
                                } else if (!empty($_GET['category']) && !empty($_GET['price']) && empty($_GET['rating'])) {
                                    //Look for all products with given category and price 
                                    
                                    $categoryID = $_GET['category']; 
                                    $priceRangeID = $_GET['price']; 
                                    
                                    if ($priceRangeID == '1') { 
                                        //Look for all products with given category AND price less than $50 
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID 
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        WHERE (Category.CategoryID = ?) AND (Price < 50.00)
                                        LIMIT 50 
                                        ";
                                        
                                    } else if ($priceRangeID == '2') { 
                                        //Look for all products with given category AND price between $50 to $150 
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID 
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        WHERE (Category.CategoryID = ?) AND (Price BETWEEN 50.00 AND 150.00) 
                                        LIMIT 50 
                                        ";

                                    } else if ($priceRangeID == '3') { 
                                        //Look for all products with given category AND price between $150 to $500 
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID 
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        WHERE (Category.CategoryID) = ? AND (Price BETWEEN 150.00 AND 500.00)
                                        LIMIT 50 
                                        ";
                                        
                                    }
                                                    
                                    $statement = mysqli_prepare($connection, $sql); 
                                    mysqli_stmt_bind_param($statement, 'i', $categoryID); 
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement); 
                                    
                                    
                                } else if (!empty($_GET['category']) && empty($_GET['price']) && !empty($_GET['rating'])) {
                                    //Look for all products with given category and rating 
                                    
                                    $categoryID = $_GET['category']; 
                                    $ratingRangeID = $_GET['rating']; 
                                    
                                    if ($ratingRangeID == '1') { 
                                        //Look for all products with given category AND rating < 3 (aka 2 stars includes 2.x up to but not including 3)
                                        
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID , AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID
                                        WHERE (Category.CategoryID) = ?
                                        GROUP BY Name
                                        HAVING (AvgRating < 3)
                                        LIMIT 50
                                        ";
                                        
                                        
                                    } else if ($ratingRangeID == '2') { 
                                        //Look for all products with given category with rating at least 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID , AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID
                                        WHERE (Category.CategoryID) = ?
                                        GROUP BY Name
                                        HAVING (AvgRating >= 3)
                                        LIMIT 50
                                        ";
                                        
                                    } else if ($ratingRangeID == '3') { 
                                        //Look for all products with given category with rating at least 4 
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID , AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID
                                        WHERE (Category.CategoryID) = ?
                                        GROUP BY Name
                                        HAVING (AvgRating >= 4)
                                        LIMIT 50
                                        ";
                                        
                                    }
                                    
                                    $statement = mysqli_prepare($connection, $sql); 
                                    mysqli_stmt_bind_param($statement, 'i', $categoryID); 
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement); 
                                    
                                    
                                } else if (empty($_GET['category']) && !empty($_GET['price']) && !empty($_GET['rating'])) {
                                    //Look for all products with given price and rating 
                                    
                                    $priceRangeID = $_GET['price']; 
                                    $ratingRangeID = $_GET['rating']; 
                                    
                                    //Need to cover all combinations of price to range mappings. So that's 3 from price, 3 from ratings, choosing two from each, that makes a total of 2^3 combinations 
                                    if ($priceRangeID == '1' && $ratingRangeID == '1') { 
                                        //Look for all products with price < $50 and rating < 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price < 50.00
                                        GROUP BY Name
                                        HAVING (AvgRating < 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                        
                                    } else if ($priceRangeID == '1' && $ratingRangeID == '2') { 
                                        //Look for all products with price < $50 and rating >= 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price < 50.00
                                        GROUP BY Name
                                        HAVING (AvgRating >= 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                        
                                    } else if ($priceRangeID == '1' && $ratingRangeID == '3') { 
                                        //Look for all products with price < $50 and rating >= 4
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price < 50.00
                                        GROUP BY Name
                                        HAVING (AvgRating >= 4)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '2' && $ratingRangeID == '1') { 
                                        //Look for all products with price $50-$150 and rating < 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price BETWEEN 50.00 AND 150.00
                                        GROUP BY Name
                                        HAVING (AvgRating < 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '2' && $ratingRangeID == '2') { 
                                        //Look for all products with price $50-$150 and rating >= 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price BETWEEN 50.00 AND 150.00
                                        GROUP BY Name
                                        HAVING (AvgRating >= 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '2' && $ratingRangeID == '3') { 
                                        //Look for all products with price $50-$150 and rating >= 4
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price BETWEEN 50.00 AND 150.00
                                        GROUP BY Name
                                        HAVING (AvgRating >= 4)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '3' && $ratingRangeID == '1') { 
                                        //Look for all products with price $150-$500 and rating < 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price BETWEEN 150.00 AND 500.00
                                        GROUP BY Name
                                        HAVING (AvgRating < 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '3' && $ratingRangeID == '2') { 
                                        //Look for all products with price $150-$500 and rating >= 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price BETWEEN 150.00 AND 500.00
                                        GROUP BY Name
                                        HAVING (AvgRating >= 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '3' && $ratingRangeID == '3') { 
                                        //Look for all products with price $150-$500 and rating >= 4
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE Price BETWEEN 150.00 AND 500.00
                                        GROUP BY Name
                                        HAVING (AvgRating >= 4)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    }
                                    
                                     $statement = mysqli_prepare($connection, $sql); 
//                                        mysqli_stmt_bind_param($statement, 'i', $categoryID); 
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement); 
                                    
                                } else if (!empty($_GET['category']) && !empty($_GET['price']) && !empty($_GET['rating'])) {
                                    //Look for all products with given category, price, and rating 
                                    
                                    
                                    $categoryID = $_GET['category']; 
                                    $priceRangeID = $_GET['price']; 
                                    $ratingRangeID = $_GET['rating']; 
                                    
                                    //Need to cover all combinations of price to range mappings. So that's 3 from price, 3 from ratings, choosing two from each, that makes a total of 9 combinations 
                                    if ($priceRangeID == '1' && $ratingRangeID == '1') { 
                                        //Look for all products with price < $50 and rating < 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price < 50.00) 
                                        GROUP BY Name
                                        HAVING (AvgRating < 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                        
                                    } else if ($priceRangeID == '1' && $ratingRangeID == '2') { 
                                        //Look for all products with price < $50 and rating >= 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price < 50.00)
                                        GROUP BY Name
                                        HAVING (AvgRating >= 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                        
                                    } else if ($priceRangeID == '1' && $ratingRangeID == '3') { 
                                        //Look for all products with price < $50 and rating >= 4
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price < 50.00)
                                        GROUP BY Name
                                        HAVING (AvgRating >= 4)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '2' && $ratingRangeID == '1') { 
                                        //Look for all products with price $50-$150 and rating < 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID 
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price BETWEEN 50.00 AND 150.00) 
                                        GROUP BY Name
                                        HAVING (AvgRating < 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '2' && $ratingRangeID == '2') { 
                                        //Look for all products with price $50-$150 and rating >= 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price BETWEEN 50.00 AND 150.00)
                                        GROUP BY Name
                                        HAVING (AvgRating >= 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '2' && $ratingRangeID == '3') { 
                                        //Look for all products with price $50-$150 and rating >= 4
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price BETWEEN 50.00 AND 150.00)
                                        GROUP BY Name
                                        HAVING (AvgRating >= 4)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '3' && $ratingRangeID == '1') { 
                                        //Look for all products with price $150-$500 and rating < 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price BETWEEN 150.00 AND 500.00) 
                                        GROUP BY Name
                                        HAVING (AvgRating < 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '3' && $ratingRangeID == '2') { 
                                        //Look for all products with price $150-$500 and rating >= 3
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price BETWEEN 150.00 AND 500.00)
                                        GROUP BY Name
                                        HAVING (AvgRating >= 3)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } else if ($priceRangeID == '3' && $ratingRangeID == '3') { 
                                        //Look for all products with price $150-$500 and rating >= 4
                                        $sql = "
                                        SELECT Name, Description, ImageFileName, Price, Products.ProductID, AVG(Rating.RatingNumber) AS AvgRating
                                        FROM Products 
                                        INNER JOIN Category ON Products.CategoryID = Category.CategoryID
                                        INNER JOIN Rating ON Products.ProductID = Rating.ProductID 
                                        WHERE (Category.CategoryID = ?) AND (Price BETWEEN 150.00 AND 500.00) 
                                        GROUP BY Name
                                        HAVING (AvgRating >= 4)                                        
                                        LIMIT 50
                                        "; 
                                        
                                    } 
                                    
                                    $statement = mysqli_prepare($connection, $sql); 
                                    mysqli_stmt_bind_param($statement, 'i', $categoryID); 
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement);
                                    
                                }
                                
                                
                                while ($row = mysqli_fetch_assoc($result)) { 
                                    ?>
                                    <div class="col mb-4">
                                        <div class="card shopCard">
                                            <a href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>">
                                                <img src="../Images/shop/<?php echo $row['ImageFileName'];      /* ImageFileName */     ?>.jpg" class="card-img-top">
                                            </a>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    <a href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>" id="shopTitleLink">
                                                        <?php echo $row['Name'];     /* Name */   ?>
                                                    </a>
                                                </h5>

                                                <h6 class="card-subtitle mb-2 text-muted">CDN $<?php echo $row['Price'];     /* Price */   ?></h6>

                                                <p class="card-text text-truncate"><?php echo $row['Description'];    /* Description */   ?></p>

                                                <div class="text-center">
                                                    <a class="btn btn-light btn-outline-dark mb-1" href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>">
                                                    Shop
                                                    </a>

                                                    <button type="button" 
                                                            data-toggle="popover" 
                                                            data-trigger="focus" 
                                                            title="Success!" 
                                                            data-content="This item has just been added to your wish list." 
                                                            data-placement="top" 
                                                            class="btn btn-light btn-outline-dark mb-1 addToWishListButton"
                                                            href="<?php echo $row['ProductID']; ?>">
                                                            Add to Wish List
                                                    </button>

                                                    <button type="button" 
                                                            data-toggle="popover" 
                                                            data-trigger="focus" 
                                                            title="Success!" 
                                                            data-content="This item has just been added to your cart. We can't wait for you to enjoy it soon!" 
                                                            data-placement="top"
                                                            class="btn btn-light btn-outline-dark mb-1 addToCartButton"
                                                            href="<?php echo $row['ProductID']; ?>">
                                                            Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                        <?php 
                                }
                            }
                        ?>



                    </div> <!-- Product list --> 
                    
                </div>

        
            </div>            
            
            <div class="border-top my-3"></div>
            
            <!--Footer information-->
            <div class="page-footer">
                <div class="footerContainer text-center">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="text-uppercase font-weight-bold">More information</h4>
                            <div class="border-top my-3"></div>
                            <p>Whimsy was founded in 2020, and strives to be a market leader innovating on the concept 
                            of a marketplace, as a community, a public ground, and a place where people can form 
                            relationships.</p>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-uppercase font-weight-bold">Contact information</h4>
                            <div class="border-top my-3"></div>
                            <p>2877 Valley Road, San Francisco, California
                            <br>
                            contactWhimsy@whimsy.ca
                            <br>
                            1 222 333 4567 
                        </div>
                    
                    </div>
                
                </div>
                
                            
            </div>
            
            
            <script>
                $(document).ready(function() {
                    $(".addToWishListButton").popover();
                    $(".addToCartButton").popover();
                                 
                    
                    $(".addToWishListButton").on("click", function() { 
                        $(this).attr('id', 'specialPopoverWishListElement'); 
                        $productID = $(this).attr('href'); 


                        var wishListResponse = $.get("../PHP/addItemToWishList.php?productID=" + $productID); 

//                        $('#specialPopoverElement').popover('show'); 

                        wishListResponse.done( 
                            function() { 
                                $('#specialPopoverWishListElement').popover('show'); 
                            }
                        );
                        $(this).removeAttr("id");
                    });   
                    
                    $(".addToCartButton").on("click", function() {
                        $(this).attr('id', 'specialPopoverCartElement'); 
                        $productID = $(this).attr('href');
                        


                        var cartResponse = $.get("../PHP/addItemToCart.php?productID=" + $productID); 

//                        $('.addToCartButton').popover('show'); 

                        cartResponse.done( 
                            function() { 
                                $('#specialPopoverCartElement').popover('show'); 
                            }
                        );
                        $(this).removeAttr("id");
                    });
                    
                    
                    $(".nav-item").removeClass("active"); 
                    $("#headerShopLink").addClass("active"); 
                    
                });
            
            </script>    
                
        </div>
    </body>
    
</html>
