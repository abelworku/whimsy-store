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
        <title>
            <?php 
            $productID = $_GET['productID'];
            
            $sql = "
            SELECT Name 
            FROM Products
            WHERE Products.ProductID = ?
            ";
            
            $statement = mysqli_prepare($connection, $sql); 
            mysqli_stmt_bind_param($statement, 'i', $productID); 
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement); 
        
            $row = mysqli_fetch_assoc($result); 
            
            echo $row['Name']; 
            ?> 
            | Whimsy 
        </title> 
        
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
        <link href="../CSS/ProductPage.css" rel="stylesheet">
<!--        <script type="text/javascript" src="../JavaScript/script.js"></script>-->

        
        <style>
            <?php include('../CSS/general.css') ?>
            <?php include('../CSS/ProductPage.css') ?>
        </style> 
    
    </head>

    <body class="bg-light">
        <div class="container-fluid bg-white">
            
            <?php include '../PHP/header.php';?>
            
            <div class="mainContainer">    
                
                <?php 
                //PHP here to get all the necessary information about the product which we can then refer to here 
                /* Need to get: 
                    - ImageFileName, Name, Description, Average Rating aggregated, Shipping Speed 
                    - Return Policy, Price, Tag, and Inventory ("X" items left in stock) 
                */ 
                $productID = $_GET['productID']; 
                
                $sql = "
                SELECT ImageFileName, Name, Description, ROUND(AVG(Rating.RatingNumber),1) AS AvgRating, ShippingSpeed, ReturnPolicy, Price, Tag.TagName, Inventory.InventoryAmount, Products.CategoryID, Tag.TagID  
                FROM Products 
                INNER JOIN Tag ON Products.TagID = Tag.TagID 
                INNER JOIN Rating ON Products.ProductID = Rating.ProductID
                INNER JOIN Inventory ON Products.InventoryID = Inventory.InventoryID
                WHERE Products.ProductID = ? 
                GROUP BY Name 
                ";
                
                $statement = mysqli_prepare($connection, $sql); 
                mysqli_stmt_bind_param($statement, 'i', $productID); 
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);
                
                $row = mysqli_fetch_assoc($result); 
                
                $categoryID = $row['CategoryID'];
                $tagID = $row['TagID']; 
                
                //---------------------------------------------------
                //Adding the item to the session state 2D array variable recentlyViewed, to show all items that the user recently viewed 
                $recentlyViewedRecord = array("Name"=>$row['Name'], "ImageFileName"=>$row['ImageFileName'], "Price"=>$row['Price'], "ProductID"=>$productID); 
                
                if (!isset($_SESSION['recentlyViewed'])) { 
                
                    $_SESSION["recentlyViewed"] = array();
                    
                    $allRecentlyViewed = $_SESSION['recentlyViewed']; 
                    
                    $allRecentlyViewed[$productID] = $recentlyViewedRecord;
                    
                    $_SESSION["recentlyViewed"] = $allRecentlyViewed; 
                    
                } else {
                    
                    $allRecentlyViewed = $_SESSION['recentlyViewed']; 
                    
                    $allRecentlyViewed[$productID] = $recentlyViewedRecord; 
                    
                    $_SESSION["recentlyViewed"] = $allRecentlyViewed; 
                } 
                
                ?> 
                
                <h3 class="font-weight-bold display-4 mb-5 mt-n3">
                    <?php 
                    $sqlForTitle="
                    SELECT CategoryName
                    FROM Category
                    WHERE CategoryID = ? 
                    ";
                    
                    $statementTwo = mysqli_prepare($connection, $sqlForTitle);
                    mysqli_stmt_bind_param($statementTwo, 'i', $categoryID);
                    mysqli_stmt_execute($statementTwo);
                    $resultTwo = mysqli_stmt_get_result($statementTwo); 
                    
                    $rowTwo = mysqli_fetch_assoc($resultTwo); 
                    
                    ?>
                    
                    <?php echo $rowTwo['CategoryName']; ?> 
                    <small class="text-muted">&middot; From Whimsy</small>
                </h3>                
                
                <div class="card-deck px-5">
                    
                    <div class="card mainCard">
                        <img src="../Images/shop/<?php echo $row['ImageFileName'];      /* ImageFileName */     ?>.jpg" class="card-img-top mainCardImgTop">
                    </div>
                    
                    <div class="card mainCard">
                        <div class="card-body">
                            <h5 class="font-weight-bold display-4"><?php echo $row['Name']; ?></h5>
                            
                            <p class="card-text"><strong>CDN $<?php echo $row['Price']; ?></strong></p>                            
                            
                            <p class="card-text"><?php echo $row['Description']; ?></p>
                            
                            <p class="card-text"><mark><strong>Rating:</strong></mark> <?php echo $row['AvgRating']; ?>/5</p>
                            
                            <p class="card-text"><mark><strong>Shipping Speed:</strong></mark> <?php echo $row['ShippingSpeed']; ?></p>
                            
                            <p class="card-text"><mark><strong>Return Policy:</strong></mark> <?php echo $row['ReturnPolicy']; ?></p>

                            <p class="card-text"><mark><strong>Tags:</strong></mark> <?php echo $row['TagName']; ?></p> 
                            
                            <p class="card-text"><em><?php echo $row['InventoryAmount']; ?> items left in stock.</em></p>
                            
                        </div>
                        
                        <div class="text-center">
                            <button type="button" 
                                    data-toggle="popover" 
                                    data-trigger="focus" 
                                    title="Success!" 
                                    data-content="This item has just been added to your wish list." 
                                    data-placement="top" 
                                    class="btn btn-light btn-outline-dark mb-4 px-4 mr-5 py-2" 
                                    id="addToWishListButton">
                                <strong>Add to Wish List</strong>
                            </button>
                            <button type="button" 
                                    data-toggle="popover" 
                                    data-trigger="focus" 
                                    title="Success!" 
                                    data-content="This item has just been added to your cart. We can't wait for you to enjoy it soon!" 
                                    data-placement="top"
                                    class="btn btn-light btn-outline-dark mb-4 px-5 py-2"
                                    id="addToCartButton">
                                <strong>Add to Cart</strong>
                            </button>
                        </div>
                    </div>
                    
                </div>                
                
                <h5 class="font-weight-light display-4 mt-5">Related Products by Category:</h5>
                
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-lg-8 mt-5">
                
                    <?php 
                    //Query for products with the same category, then output a row of cards 
                    $sql="
                    SELECT Name, ImageFileName, Price, ProductID, CategoryName 
                    FROM Products 
                    INNER JOIN Category ON Products.CategoryID = Category.CategoryID
                    WHERE (Products.CategoryID = ?) AND (Products.ProductID != ?)
                    ";

                    $statement = mysqli_prepare($connection, $sql); 
                    mysqli_stmt_bind_param($statement, 'ii', $categoryID, $productID); 
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);


                    if (mysqli_num_rows($result) == 0) { 
                        //No results 
                        echo "</div>";
                        echo "<h5 class='py-3 pl-1 font-weight-light'>&middot; No related products in this category yet. But Whimsy always aims to expand its catalogue! Check back later for new additions.</h5>";
                        
                    } else { 
                        while ($row = mysqli_fetch_assoc($result)) { 
                            ?>
                            <div class="col">
                                <div class="card relatedProductCard">
                                    <a href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>">
                                        <img class="card-img-top relatedCardImgTop" src="../Images/shop/<?php echo $row['ImageFileName'];      /* ImageFileName */     ?>.jpg">
                                    </a>
                                    
                                    <div class="card-body">

                                        <h5 class="card-title">
                                            <a href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>" id="shopTitleLink">
                                                <?php echo $row['Name'];     /* Name */   ?>
                                            </a>
                                        </h5>

                                        <h6 class="card-subtitle mb-2 text-muted">CDN $<?php echo $row['Price'];     /* Price */   ?></h6>                                

                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Also in the <mark><?php echo $row['CategoryName'];      /* CategoryName */     ?></mark> category</small>
                                    </div>
                                </div>
                            </div>


                    <?php 
                        }
                        echo "</div>";
                    }
                    ?>
                
                
<!--                </div>-->
        
                
                <?php
                $sql = "
                SELECT TagName 
                FROM Tag 
                WHERE TagID = ?  
                ";
                
                $statement = mysqli_prepare($connection, $sql); 
                mysqli_stmt_bind_param($statement, 'i', $tagID); 
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement); 
                
                $row = mysqli_fetch_assoc($result);
                
                ?>
                
                <h5 class="font-weight-light display-4 mt-5">More Products that are <?php echo $row['TagName']; ?>:</h5>
                
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-lg-8 mt-5">
                
                    <?php 
                    //Query for products with the same category, then output a row of cards 
                    $sql="
                    SELECT Name, ImageFileName, Price, ProductID, Tag.TagName 
                    FROM Products 
                    INNER JOIN Tag ON Products.TagID = Tag.TagID
                    WHERE (Products.TagID = ?) AND (Products.ProductID != ?)
                    ";

                    $statement = mysqli_prepare($connection, $sql); 
                    mysqli_stmt_bind_param($statement, 'ii', $tagID, $productID); 
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);

                    if (mysqli_num_rows($result) == 0) { 
                        //No results 
                        echo "</div>";
                        echo "<h5 class='py-3 pl-1 font-weight-light'>&middot; No related products in this tag yet. But Whimsy always aims to expand its catalogue! Check back later for new additions.</h5>";
                        
                    } else { 
                        while ($row = mysqli_fetch_assoc($result)) { 
                            ?>
                            <div class="col">
                                <div class="card relatedProductCard">
                                    <a href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>">
                                        <img class="card-img-top relatedCardImgTop" src="../Images/shop/<?php echo $row['ImageFileName'];      /* ImageFileName */     ?>.jpg">
                                    </a>
                                    
                                    <div class="card-body">

                                        <h5 class="card-title">
                                            <a href="ProductPage.php?productID=<?php echo $row['ProductID'];   /* ProductID */     ?>" id="shopTitleLink">
                                                <?php echo $row['Name'];     /* Name */   ?>
                                            </a>
                                        </h5>

                                        <h6 class="card-subtitle mb-2 text-muted">CDN $<?php echo $row['Price'];     /* Price */   ?></h6>                                

                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Also in the <mark><?php echo $row['TagName'];      /* TagName */     ?></mark> tag</small>
                                    </div>
                                </div>
                            </div>


                    <?php 
                        }
                        echo "</div>";
                    }
                    ?>
                
                
<!--                </div>-->
                
                    <h5 class="font-weight-light display-4 mt-5">Recently Viewed</h5>
                                
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-lg-8 mt-5">
                
                        <?php 
                        
                        if (count($_SESSION["recentlyViewed"]) == 1) { 
                            echo "</div>";
                            echo "<h5 class='py-3 pl-1 font-weight-light'>&middot; You haven't viewed any more items yet. Explore more of what Whimsy has to offer by looking through our catalogue!</h5>";
                                                    
                        } else { 
                            
                            $allRecentlyViewed = array_reverse($_SESSION['recentlyViewed']); 
                            $count = 0;
                            
                            foreach ($allRecentlyViewed as $itemRow) { 
                                if ($count == 4) { 
                                    $tempAllRecentlyViewed = array_reverse($_SESSION['recentlyViewed']); 
                                    $newAllRecentlyViewed = array();
                                    //Take only the last 4 items, put them into a new 2D array 
                                    $index = 0; 
                                    foreach($tempAllRecentlyViewed as $rowToKeep) { 
//                                        if ($index <= count($_SESSION['recentlyViewed']) - 4) { 
                                        if ($index == 4) {     
                                            break;
                                        } else { 
                                            $index++; 
                                            $newAllRecentlyViewed[$productID] = $rowToKeep;
                                        }
                                    }
                                    
                                    $_SESSION['recentlyViewed'] = $newAllRecentlyViewed;
                                    
//                                    
//                                    $index = 0; 
//                                    foreach ($tempAllRecentlyViewed as $deleteRow) { 
//                                        if ($index <= count($_SESSION['recentlyViewed']) - 4) { 
//                                            break;
//                                        } else { 
//                                            $index++;
//                                            unset($tempAllRecentlyViewed[$deleteRow]); 
//                                        }
//                                    }
//                                    $_SESSION['recentlyViewed'] = $tempAllRecentlyViewed; 
//                                    for ($index = 0; $index <= count($_SESSION['recentlyViewed']) - 4; $index++) { 
//                                        $tempAllRecentlyViewed = $_SESSION['recentlyViewed']; 
//                                        
//                                    
//                                    }
                                    
//                                    $_SESSION['recentlyViewed'] = array(); 
                                    break; 
                                
                                } else { 
                                    $count++;
                                ?>
                                    <div class="col">
                                    <div class="card relatedProductCard">
                                        <a href="ProductPage.php?productID=<?php echo $itemRow['ProductID'];   /* ProductID */     ?>">
                                            <img class="card-img-top relatedCardImgTop" src="../Images/shop/<?php echo $itemRow['ImageFileName'];      /* ImageFileName */     ?>.jpg">
                                        </a>

                                        <div class="card-body">

                                            <h5 class="card-title">
                                                <a href="ProductPage.php?productID=<?php echo $itemRow['ProductID'];   /* ProductID */     ?>" id="shopTitleLink">
                                                    <?php echo $itemRow['Name'];     /* Name */   ?>
                                                </a>
                                            </h5>

                                            <h6 class="card-subtitle mb-2 text-muted">CDN $<?php echo $itemRow['Price'];     /* Price */   ?></h6>                                

                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">You have <mark>recently viewed</mark> this item.</small>
                                        </div>
                                    </div>
                                </div>   
                            
                            
                        <?php 
                                }
                            }
                            echo "</div>";
                        }
                        ?>
        
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
                    $("#addToWishListButton").popover();
                    $("#addToCartButton").popover();
                                 
                    
                    $("#addToWishListButton").on("click", function() { 

                        const queryString = window.location.search;
                        const urlParameters = new URLSearchParams(queryString); 
                        var productID = urlParameters.get('productID');


                        var wishListResponse = $.get("../PHP/addItemToWishList.php?productID=" + productID); 

//                        $('#addToWishListButton').popover('show'); 

                        wishListResponse.done( 
                            function() { 
                                $('#addToWishListButton').popover('show'); 
                            }
                        );

                    });   
                    
                    $("#addToCartButton").on("click", function() { 

                        const queryString = window.location.search;
                        const urlParameters = new URLSearchParams(queryString); 
                        var productID = urlParameters.get('productID');


                        var cartResponse = $.get("../PHP/addItemToCart.php?productID=" + productID); 

//                        $('#addToCartButton').popover('show'); 

                        cartResponse.done( 
                            function() { 
                                $('#addToCartButton').popover('show'); 
                            }
                        );

                    });
                    
                    $(".nav-item").removeClass("active"); 
                    $("#headerShopLink").addClass("active"); 
                
                });
                
            </script>
        </div>
    </body>

</html>