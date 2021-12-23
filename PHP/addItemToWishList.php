<?php 
    session_start(); 
?> 

<?php

    //Access the query string parameters 
    $productID = $_GET['productID'];

    if (empty($productID)) { 
    } else if (!empty($productID)) { 
        
        $wishListRecord = array("productID"=>$productID); 
        
        if (!isset($_SESSION['wishList'])) { 
            
            $_SESSION["wishList"] = array();  
            
            $allWishList = $_SESSION['wishList']; 
            
            $allWishList[$productID] = $wishListRecord; 
            
            $_SESSION["wishList"] = $allWishList; 
            
        } else { 
            
            $allWishList = $_SESSION['wishList']; 
            
            $allWishList[$productID] = $wishListRecord; 
            
            $_SESSION["wishList"] = $allWishList;    
        }
    }

//    header("Location: WishList.php"); 

?> 