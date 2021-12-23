////The future home for script.js. Coming soon... 
//$(document).ready(function(){ 
//    //set up listeners for the change event, for the file items 
////    $("input[type=file]").change(function() { 
////        console.log("The file to upload is " + this.value);  
////    });
//    
//    /*
//    Ok, now that we're in jquery, I need to add an onclick listener to the buttons "Add to Wish List" 
//    and "Add to Cart". If this works for different pages, the queries will all have to work the same, 
//    so maybe it'll be best to select them via a class called "addToWishListButton" and "addToCartButton" 
//    -   First I'll get the wish list working, then the cart 
//    
//    - I need to select all buttons with the class with jQuery, and then add a listener linking to a function, and then in that function, send a GET request. Once that GET request is sent, and there's a successful response, show a small modal from bootstrap that'll last for a few seconds saying it was added to the wish list 
//    
//    */
//    
////    alert("Page loaded"); 
//    $(".addToWishListButton").on("click", function() { 
////        alert("Hey I was clicked");
//        
//        //I need to able to send the productID over to addToWishList, without querying the database, this can be done by looking at the url 
//        const queryString = window.location.search;
//        const urlParameters = new URLSearchParams(queryString); 
//        var productID = urlParameters.get('productID');
//        
//        
//        var wishListResponse = $.get("../PHP/addItemToWishList.php?productID=" + productID); 
//    
//        wishListResponse.done( 
//            function(data) { 
//                $('.addToWishListButton').popover({
//                    trigger: 'focus'
//                });
//            }
//        );
//        
//    
//    }); 
//    
//    
//});