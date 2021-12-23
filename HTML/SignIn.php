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
        <title>Sign In | Whimsy</title> 
        
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
        <link href="../CSS/SignIn.css" rel="stylesheet">
<!--        <script type="text/javascript" src="../JavaScript/script.js"></script>-->
        
        <style>
            <?php include('../CSS/general.css') ?>
            <?php include('../CSS/SignIn.css') ?>
        </style> 
        
    </head>

    <body class="bg-light">
        <div class="container-fluid bg-white">
            
            <?php include '../PHP/header.php';?>

            <div class="mainContainer">
                
                <div class="row">
                    
                    <div class="col-sm-12 col-md-6 border-right">
                    
                        <h5 class="font-weight-light display-4 text-center">Sign in</h5>
                        <form class="mb-4 mt-5" method="post" action="../PHP/SignInService.php" id="signInForm" style="padding-left: 10%; padding-right: 10%;">

                            <div class="form-group">
                                <label>Username</label>
                                <input name="signInEmailInput" class="form-control" id="signInUsername" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="signInPasswordInput" class="form-control" id="signInPassword" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary" id="signInFormButton">Sign in</button>

                        </form>
                
                    </div>
                                        
                    <div class="col-sm-12 col-md-6">
                    
                        <h5 class="font-weight-light display-4 text-center">Sign up</h5>
                        <form class="mb-4 mt-5" method="post" action="../PHP/SignUpService.php" id="signUpForm" style="padding-left: 10%; padding-right: 10%;">

                            <div class="form-group">
                                <label>Username</label>
                                <input name="signUpEmailInput" class="form-control form-control-is-valid" id="signUpEmail" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="signUpPasswordInput" class="form-control" id="signUpPassword" placeholder="Password">
                            </div>

                            <div class="form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="signUpCheckbox">
                                <label class="form-check-label" id="signUpCheckboxLabel">I agree to Whimsy's Terms of Service and Privacy Policy</label>
                            </div>

                            <button type="submit" class="btn btn-primary" id="signUpFormButton">Sign up</button>

                        </form>
                
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
                    
//                    console.log("Hello");
                    $("#signUpFormButton").on("click", function(event) { 
                        
//                        console.log("Button was pressed");
                        event.preventDefault(); 
//                        
                        var email = $("#signUpEmail");
                        var password = $("#signUpPassword"); 
                        var userCheckbox = $("#signUpCheckbox");   
                        var userCheckboxLabel = $("#signUpCheckboxLabel");
                        
//                        console.log("Hello");
//                        console.log(email.val());
//                        console.log(password.val());
                        
                        if (email.val() == "") { 
                            email.removeClass("filledInput"); 
                            email.addClass("emptyInput"); 
                            event.preventDefault();
                        } 
                        
                        if (password.val() == "") {
                            password.removeClass("filledInput"); 
                            password.addClass("emptyInput"); 
                            event.preventDefault(); 
                        }
                        
                        if (!(userCheckbox.is(':checked'))) {
                            userCheckboxLabel.removeClass("filledInput"); 
                            userCheckboxLabel.addClass("emptyInput"); 
                            event.preventDefault(); 
                        }
                        
                        $(".emptyInput").css("background-color", "#ffb3b3");
                        $(".emptyInput").css("border", '1px solid red');
                        
                        
//                        var emptyInputFields = $(".emptyInput"); 
//                        console.log(emptyInputFields);
//                        
//                        for (var i = 0; i < emptyInputFields.length; i++) { 
////                            emptyInputFields[i].css({ 
////                                'border' : '1px solid red',
////                                "background-color": "#ffb3b3",
////                            });
//                                
//                                
////                                "border-color", "#d70000");
//                            emptyInputFields[i].css("background-color", "#ffb3b3");
//                            emptyInputFields[i].css("border", '1px solid red');
//                            
//                        }
                        
                        if (email.val() != "") { 
                            email.removeClass("emptyInput"); 
                            email.addClass("filledInput");
                            event.preventDefault();
                        } 
                        
                        if (password.val() != "") { 
                            password.removeClass("emptyInput"); 
                            password.addClass("filledInput");
                            event.preventDefault(); 
                        }
                        
                        if (userCheckbox.is(':checked')) { 
                            userCheckboxLabel.removeClass("emptyInput"); 
                            userCheckboxLabel.addClass("filledInput");
                            event.preventDefault(); 
                        }
                        
                        
                        $(".filledInput").css("background-color", ""); 
                        $(".filledInput").css("border", ""); 
                        
//                        css("background-color", "#ffb3b3");
//                        $(".emptyInput").css("border", '1px solid red');
//                        
//                      
                        
                        
//                        var postData = $("#signUpForm").serialize(); 
//                        $.post("")
//                        //redirect after 
                    
//                        if (email.val() != "" && password.val() != "" && userCheckbox.is(':checked')) {
////                            console.log("Can proceed");
//                            
////                            var dataSendPost = "email=" + email + "password" + password;
////                            $.post("../PHP/SignUpService.php", {emailSend: email, passwordSend: password}); 
//                            
////                            
//                            
//                            
//                            
//                            
////                            var postData = $("#signUpForm").serialize();
////                            var postResponse = $.post("../PHP/SignUpService.php", postData); 
////                            
////                            postResponse.done(
////                                function() { 
////                                    console.log(postData);
////                                }
////                            )
////                            
//                            
////                            //Redirect after to SignUpService.php
////                            window.location.replace("../PHP/SignUpService.php"); 
//                            
//                            
//                            
//                        }                    
                    
                    }); 
                    
                    $("#signUpForm").on("submit", function(event) { 

                        event.preventDefault(); 

                        $.ajax({
                            method: "POST",
                            url: "../PHP/SignUpService.php", 
                            data: { email: email.val(), password: password.val() } 


                            success: function() { 
                                console.log("Successfully sent");
                            }


                        }); 


                    }
                    
                    var userEmail = $("#signInUsername");
                    var userPassword = $("#signInPassword"); 
                                        
                    $("#signInForm").on("submit", function(event) { 

                        event.preventDefault(); 

                        $.ajax({
                            method: "POST",
                            url: "../PHP/SignInService.php", 
                            data: { email: userEmail.val(), password: userPassword.val() } 


                            success: function() { 
                                console.log("Successfully sent");
                            }


                        }); 


                     }
                    
                    
                    
                    
                    
                    
                    
                    $(".nav-item").removeClass("active"); 
                    $("#headerSignInLink").addClass("active");
                });
            
            </script>
        </div>
    </body>
    
</html>