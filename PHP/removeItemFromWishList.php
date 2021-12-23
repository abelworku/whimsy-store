<?php 
    session_start(); 
?>

<?php 

    if (!isset($_GET['productID'])) { 
        
        $_SESSION['wishList'] = array();
    
    } else { 
        $productID = $_GET['productID']; 
        
        $allWishList = $_SESSION['wishList']; 
        
        foreach($allWishList as $rowKey=>$rowArray) { 
            if ($rowKey == $productID) { 
                unset($allWishList[$rowKey]); 
            }
        
        }
        
        $_SESSION['wishList'] = $allWishList;
    
    } 

    header("Location: ../HTML/WishList.php");

?>