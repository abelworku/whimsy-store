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
        <title>Cart | Whimsy</title> 
        
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
        <link href="../CSS/Cart.css" rel="stylesheet">
<!--        <script type="text/javascript" src="../JavaScript/script.js"></script>-->
        
        <style>
            <?php include('../CSS/general.css') ?>
            <?php include('../CSS/Cart.css') ?>
        </style> 
        
    </head>

    <body class="bg-light">
        <div class="container-fluid bg-white">
            
            <?php include '../PHP/header.php';?>

            <div class="mainContainer">
                
                <div class="row">
                    
                    <div class="col-sm-12 col-md-6">
                        <h5 class="font-weight-light display-4">
                            Cart &middot; 
                            <span class="text-muted">
                            <?php 
                            $allCart = $_SESSION['cart']; 
                    
                            if (count($allCart) == 0) { 
                                echo "0 items";
                            } else if (count($allCart) == 1) {    
                                echo "1 item"; 
                            } else { 
                                echo count($allCart) . " items";
                            
                            }
                                
                                
                            ?>
                            
                            
                            </span>
                            
                        
                        
                        </h5>
                        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a class="btn btn-dark btn-outline-light mt-3 px-3 py-2 float-right" href="../PHP/removeItemFromCart.php">
                            Clear All
                        </a>
                    </div>
                
                </div>
                
                <div class="text-center">
                    <h1 class="font-weight-light">Total:
                    <span class="text-muted">
                    <?php 
                    $allCart = $_SESSION['cart']; 
                    
                    if (count($allCart) == 0) { 
                        echo "$0.00";
                    } else { 
                        $total = 0; 
                        foreach($allCart as $itemRow) { 
                            $productID = $itemRow['productID']; 

                            $sql = "
                            SELECT Price
                            FROM Products
                            WHERE (Products.ProductID = ?)
                            ";

                            $statement = mysqli_prepare($connection, $sql); 
                            mysqli_stmt_bind_param($statement, 'i', $productID);
                            mysqli_stmt_execute($statement);
                            $result = mysqli_stmt_get_result($statement); 
                            
                            $row = mysqli_fetch_assoc($result); 
                        
                            $total = $total + $row['Price']; 
                        }
                        echo "$" . $total; 
                    
                    }
                    
                    ?>
                    </span>
                    </h1>
                </div>
                
                
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-lg-8 mt-5">
                    
                    <?php 
                        
                    //Need to go through the session state wishList, get the productID, then query for all necessary information, then display it 
                    $allCart = $_SESSION['cart']; 
                    
                    if (count($allCart) == 0) { 
                            echo "</div>";
                            echo "<div class='text-center'>";
                            echo "<h5 class='py-3 pl-1 font-weight-light'>&middot; You don't have any items in your cart yet, we can fix that by exploring what Whimsy has to offer by looking through our <a href='../HTML/Shop.php'>catalogue</a>!</h5>";
                            echo "</div>";    
                        
                    } else { 
                    
                        foreach($allCart as $itemRow) { 

                            $productID = $itemRow['productID']; 

                            $sql = "
                            SELECT Name, ImageFileName, Price, ProductID, CategoryName, Tag.TagName
                            FROM Products
                            INNER JOIN Category ON Products.CategoryID = Category.CategoryID
                            INNER JOIN Tag ON Products.TagID = Tag.TagID
                            WHERE (Products.ProductID = ?)
                            ";

                            $statement = mysqli_prepare($connection, $sql); 
                            mysqli_stmt_bind_param($statement, 'i', $productID);
                            mysqli_stmt_execute($statement);
                            $result = mysqli_stmt_get_result($statement); 
                            
                            $row = mysqli_fetch_assoc($result); 
                            
                            ?>
                            <div class="col mb-4">
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
                                            
                                        <div class="row">
                                            <div class="col-sm-12 col-md-7">
                                                <small class="text-muted"><mark><?php echo $row['CategoryName'];    /* CategoryName */    ?></mark> &middot; <mark><?php echo $row['TagName'];      /* TagName */     ?></mark></small>
                                            </div>
                                            <div class="col-sm-12 col-md-5">
                                                <a class="btn btn-dark btn-outline-light px-3 py-2 float-right" href="../PHP/removeItemFromCart.php?productID=<?php echo $row['ProductID']; ?>">
                                                    Remove
                                                </a>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                    
                    <?php       
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
                    
                    
                    
                    $(".nav-item").removeClass("active"); 
                    $("#headerCartLink").addClass("active");
                });
            
            </script>
        </div>
    </body>
    
</html>