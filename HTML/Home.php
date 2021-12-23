<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home | Whimsy</title> 
        
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
        <link href="../CSS/home.css" rel="stylesheet">
<!--        <script type="text/javascript" src="../JavaScript/script.js"></script>-->
        
        <style>
            <?php include('../CSS/general.css') ?>
            <?php include('../CSS/home.css') ?>
        </style> 
        
    </head>
    
    <body class="bg-light">
        <div class="container-fluid bg-white">
                
            <!-- Header placed in a header.php file -->
            <?php include '../PHP/header.php';?>
            
            <div class="mainContainer"> <!-- Main container -->
                
                <?php 
                    if ($_SESSION['userName'] != "") { 
                        echo "<h1 class='font-weight-light text-center mb-5 mt-n3'>"; 
                        echo "We're so glad to see you again, " . $_SESSION['userName'] . "!";
                        echo "</h1>"; 
                    }
                ?>
                
                <div id="carouselSlideshow" class="carousel slide" data-ride="carousel" data-interval="false">
                
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 carouselImage" src="../Images/home/green-door-with-open-sign.jpg" alt="First slideshow image">
                            <div class="slideshowCaption carousel-caption d-none d-md-block rounded-right">
                                <h5>Always here when you need a hand.</h5>
                            </div>
                            
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100 carouselImage" src="../Images/home/light-shining-on-vinyl-records.jpg" alt="Second slideshow image">
                            <div class="slideshowCaption carousel-caption d-none d-md-block rounded-right">
                                <h5>Home of the unique and unconventional.</h5>
                            </div>
                        </div>
                        
                        <div class="carousel-item">
                            <img class="d-block w-100 carouselImage" src="../Images/home/shipping-boxes-in-front-of-red-brick.jpg" alt="Third slideshow image">
                            <div class="slideshowCaption carousel-caption d-none d-md-block rounded-right">
                                <h5>Guaranteed 10-minute shipping.</h5>
                            </div>
                            
                            <div class="carousel-caption d-none d-md-block rounded-right">
                                <a href="Shop.php" class="btn btn-light btn-lg btn-outline-dark">Shop Now</a>
                            </div>    
                                
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#carouselSlideshow" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#carouselSlideshow" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                
                </div>           
                
                <blockquote class="blockquote text-center px-5 my-5">
                    <p class="mb-0">"Our imagination is the only limit to what we can hope to have in the future."</p>
                    <footer class="blockquote-footer">Charles Kettering</footer>
                </blockquote>                
                
                
                <div class="card homeCard bg-light">
                    <div class="row no-gutters h-100">
                        <div class="col-md-4 h-100">
                            <img class="homeCardImage1 card-img-top" src="../Images/home/boxer-dog.jpg" alt="Picture of dog">
                        </div>
                    
                        <div class="col-md-8 align-self-center">
                            <div class="card-body h-100">
                                <h4 class="card-title">Our Story</h4>

                                <div class="border-top my-3"></div>

                                <p class="card-text">
                                    In 2020, we wanted to show the world that e-commerce should not be limited to mere utility or usefulness. 
                                    We want to make shopping fun again! With Whimsy, we are making that happen. Our user-friendly approach 
                                    to your shopping experience will make you feel right at home, and we at Whimsy will work tirelessly to ensure your needs 
                                    are met. <br><br>This is the home of our award-winning pogo-stick boots, our best-selling propeller umbrella, and our 
                                    much sought after hot air balloon. As a home for all things whimsical, daring, and unconventional, you'll find 
                                    that we're unlike any other online marketplace. 
                                </p>

                                <div class="border-top my-3"></div>

                                <a href="About.html" class="card-link">More about us</a>
                                <a href="Team.html" class="card-link">Who we are</a>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                
                </div>
                
                <div class="jumbotron bg-light homeMidJumbotron">
                    
                    <h1 class="display-4 mb-5">Shop by Category</h1>
                    
                    <div class="d-flex flex-row flex-nowrap pb-3 homeHorizontalRow">
                        
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="card homeShopCard">
                                <div class="card-body">
                                    
                                    <h5 class="card-title">Apparel</h5> 
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
                                    <div class="text-center">
                                        <a href="Shop.php?category=1&price=0&rating=0" class="btn btn-dark stretched-link">Shop</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="card homeShopCard">
                                <div class="card-body">
                                    
                                    <h5 class="card-title">Aviation</h5> 
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
                                    <div class="text-center">
                                        <a href="Shop.php?category=2&price=0&rating=0" class="btn btn-dark stretched-link">Shop</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="card homeShopCard">
                                <div class="card-body">
                                    
                                    <h5 class="card-title">Luxury</h5> 
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
                                    <div class="text-center">
                                        <a href="Shop.php?category=3&price=0&rating=0" class="btn btn-dark stretched-link">Shop</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                     
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="card homeShopCard">
                                <div class="card-body">

                                    <h5 class="card-title">Motor</h5> 
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
                                    <div class="text-center">
                                        <a href="Shop.php?category=4&price=0&rating=0" class="btn btn-dark stretched-link">Shop</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="card homeShopCard">
                                <div class="card-body">

                                    <h5 class="card-title">Décor</h5> 
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
                                    <div class="text-center">
                                        <a href="Shop.php?category=5&price=0&rating=0" class="btn btn-dark stretched-link">Shop</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="card homeShopCard">
                                <div class="card-body">

                                    <h5 class="card-title">Accessories</h5> 
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    
                                    <div class="text-center">
                                        <a href="Shop.php?category=6&price=0&rating=0" class="btn btn-dark stretched-link">Shop</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="card homeCard bg-light">

                    <div class="row no-gutters h-100">
                        <div class="col-md-8 align-self-center">
                            <div class="card-body h-100">
                    
                                <h4 class="card-title">Customer Service</h4>
                                <div class="border-top my-3"></div>
                                <p class="card-text">
                                    Whimsy has recently expanded their physical presence! Come visit us in a customer centre near you, and see what we have to offer. 
                                    We have chocolate-chip cookies. If you have any questions, try browsing our <a href="FAQ.html" class="card-link ">FAQ</a> page, or check out our contact information to 
                                    call us, fax us, page us, email us, or send a letter. We really like letters.  
                                    <br> 
                                    <br>
                                    <span class="font-weight-bold">Locations:</span>
                                    <br>
                                    <span class="font-weight-bold">Canada:</span> Toronto, Vancouver, Montreal, Calgary, Halifax
                                    <br>
                                    <span class="font-weight-bold">United States:</span> Washington DC, New York City, Seattle, Chicago, Boston, New Orleans
                                </p>

                                <div class="border-top my-3"></div>
                                <a href="About.html" class="card-link">FAQ</a>
                                <a href="Team.html" class="card-link">Contact us</a>
                            
                            </div>
                        </div>

                        <div class="col-md-4 h-100">
                            <img class="homeCardImage2 card-img-top" src="../Images/home/eggy-breakfast.jpg" alt="Picture of dog">
                        </div>
                    
                    </div>
                </div>
                

                
                
                
            </div> <!-- Main container -->            
            
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
                    $("#headerHomeLink").addClass("active");
                });
            
            </script>
            
        </div>
    </body>
</html>
