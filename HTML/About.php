<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About | Whimsy</title> 
        
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
        <link href="../CSS/about.css" rel="stylesheet">
<!--        <script type="text/javascript" src="../JavaScript/script.js"></script>-->
        
    </head>

    <body class="bg-light">
        <div class="container-fluid bg-white">
            
            <?php include '../PHP/header.php';?>
    
            <div class="mainContainer">
                <!--About section-->                 
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
                
                <!--Contact information section--> 
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
                    $("#headerAboutLink").addClass("active"); 
                    
                });
            
            </script>  
                
        </div>
    </body>
    
</html>
