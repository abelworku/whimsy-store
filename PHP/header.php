<?php 
//    session_start();
    if (!isset($_SESSION['userName'])) { 
        $_SESSION['userName'] = "";
    }
//    unset($_SESSION['userName']);
?>

<nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand font-weight-bold" href="../HTML/Home.php">Whimsy</a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item active" id="headerHomeLink">
            <a class="nav-link" href="../HTML/Home.php">Home</a>
        </li>
        <li class="nav-item" id="headerShopLink">
            <a class="nav-link" href="../HTML/Shop.php">Shop</a>
        </li>
        <li class="nav-item" id="headerAboutLink">
            <a class="nav-link" href="../HTML/About.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">&middot;</a> 
        </li>
        <li class="nav-item">
            <?php 
                if (array_key_exists('wishList', $_SESSION)) { 
                    $numWishList = count($_SESSION['wishList']);

                } else { 
                    $numWishList = 0; 
                }
            ?>
            <a class="nav-link" href="../HTML/WishList.php" id="headerWishListLink">Your Wish List (<?php echo $numWishList; ?>)</a>
        </li>
        <li class="nav-item">
            <?php 
                if (array_key_exists('cart', $_SESSION)) { 
                    $numCart = count($_SESSION['cart']);

                } else { 
                    $numCart = 0; 
                }
            ?>
            <a class="nav-link" href="../HTML/Cart.php" id="headerCartLink">Cart (<?php echo $numCart; ?>)</a>
        </li>  
        <li class="nav-item">
            <a class="nav-link">&middot;</a> 
        </li>
        <li class="nav-item" id="headerSignInLink">
                <?php
                if ($_SESSION['userName'] == "") { 
                    echo "<a class='nav-link' href='../PHP/SignInService.php'>";
                    echo "Sign in";
                    echo "</a>";
                } else { 
                    echo "<a class='nav-link'>";
                    $userName = $_SESSION['userName']; 
                    echo "Hello,&nbsp;&nbsp;" . $_SESSION['userName']; 
                    echo "</a>";                    
                }
                
                ?>
            
        </li> 
        <?php 
            if ($_SESSION['userName'] != "") { 
                echo "<li class='nav-item' id='headerSignInLink'>";
                echo "<a class='nav-link' href='../PHP/SignOutService.php'>";
                echo "Sign out"; 
                echo "</a>";
                echo "</li>";
            }
        ?>
        
    </ul>
</nav>

<div class="border-top my-3"></div>
