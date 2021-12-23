<?php 
    session_start(); 
?> 

<?php

    //Access the query string parameters 
    $productID = $_GET['productID'];

    if (empty($productID)) { 
    } else if (!empty($productID)) { 
        
        $cartRecord = array("productID"=>$productID); 
        
        if (!isset($_SESSION['cart'])) { 
            
            $_SESSION["cart"] = array();  
            
            $allCart = $_SESSION['cart']; 
            
            $allCart[$productID] = $cartRecord; 
            
            $_SESSION["cart"] = $allCart; 
            
        } else { 
            
            $allCart = $_SESSION['cart']; 
            
            $allCart[$productID] = $cartRecord; 
            
            $_SESSION["cart"] = $allCart;    
        }
    }

//    header("Location: WishList.php"); 

?> 