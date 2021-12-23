<?php 
    session_start(); 
?>

<?php 

    if (!isset($_GET['productID'])) { 
        
        $_SESSION['cart'] = array();
    
    } else { 
        $productID = $_GET['productID']; 
        
        $allCart = $_SESSION['cart']; 
        
        foreach($allCart as $rowKey=>$rowArray) { 
            if ($rowKey == $productID) { 
                unset($allCart[$rowKey]); 
            }
        
        }
        
        $_SESSION['cart'] = $allCart;
    
    } 

    header("Location: ../HTML/Cart.php");

?>