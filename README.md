<!-- # whimsy-store
 -->
# Whimsy 

Whimsy is an e-commerce store, developed using Bootstrap 4 (a CSS framework), HTML, CSS, JavaScript, PHP, and SQL, where users can engage in a whimsical shopping experience as they browse merchandise. 

# Installation 

- Download and install XAMPP, an open source software stack package (free to download), to provide a server for the website to access, at "https://www.apachefriends.org/download.html". 
  - Visit "https://xamppguide.com/" for a guide about XAMPP, and how it can be used.       
- Run XAMPP as an administrator (right-click on XAMPP, and click "Run as Administrator"), and press the "Start" button for the labels "Apache" and "MySQL" (this will allow the website to communicate with a local server via HTTP to perform server-side tasks) 
- Locate XAMPP's installation destination on your local device (it should appear as the folder "xampp" in your C:/ drive). Navigate to the folder "htdocs", and place a copy of the website's contents into the "htdocs" folder, so that the application can be run on the local server provided by XAMPP.
- The website can now be accessed via any browser, with the URL "http://localhost/whimsy/HTML/Home.php", which takes you to the home page of the website. 

- Database Notes: 
  - The website's database, which stores information like products, user accounts, and ratings, is called shopdb.sql, and is located in the root level of the project's directory. In order for the website to access the database's contents on the local server (localhost), shopdb.sql can be loaded into the server by navigating to "http://localhost/phpmyadmin/", clicking the "New" button in the sidebar (to create a new database), going to the "SQL" tab in the new database, and copying the SQL contents in the shopdb.sql file into the text box, and clicking the "Go" button at the bottom.   

# Usage 

The website was designed with ease of use in mind to allow the user to navigate the website more efficiently. 

- Home Page: 
  - The user may first arrive at the home page, and is greeted with an introduction about the website. While at the home page, they may find a row of cards linking to the Shop page to browse for certain categories of products. 
  ![1](/Demo/Home/1.png)
  ---
  ![2](/Demo/Home/2.png)
  ---
  ![3](/Demo/Home/3.png)
  ---
  ![4](/Demo/Home/4.png)
  ---
  ![5](/Demo/Home/5.png)
  ---
  ![6](/Demo/Home/6.png)
- Shop Page: 
  - The user may search through the store's catalogue of products with a combination of terms - category, price, and rating - identifying product information. The search can be customized with these terms, and pressing the "Search" button will perform the search and display relevant results below. 
  ![1](/Demo/Shop/1.png)
  ---
  ![2](/Demo/Shop/2.png)
  ---
  ![3](/Demo/Shop/3.png)
  ---
  ![4](/Demo/Shop/4.png)
  ---
  ![5](/Demo/Shop/5.png)
  ---
  ![6](/Demo/Shop/6.png)
  ---
  ![7](/Demo/Shop/7.png)
- Product Page: 
  - The user may view all related information for a product, and can add a product to special lists for later viewing, such as a wish list, and a cart. 
  - The user may also see more related products by shared category, tag, and their recently viewed products in the same page. 
    ![1](/Demo/Product_Page/1.png)
    --- 
    ![2](/Demo/Product_Page/2.png)
    --- 
    ![3](/Demo/Product_Page/3.png)
    ---
    ![4](/Demo/Product_Page/4.png)
    ---
    ![5](/Demo/Product_Page/5.png)
    ---
    ![6](/Demo/Product_Page/6.png)
    ---
    ![7](/Demo/Product_Page/7.png)
- Wish List and Cart Page: 
  - Displays added items to the wish list and cart to the user, how many items have been added, and options to delete particular items or all items altogether. The "Cart" page also displays a total cost of all the items as a potential order. 
    ![1](/Demo/Wish_List_Cart/1.png)
    ---
    ![2](/Demo/Wish_List_Cart/2.png)
    ---
    ![3](/Demo/Wish_List_Cart/3.png)
    ---
    ![4](/Demo/Wish_List_Cart/4.png)
- Account Page: 
  - The user can sign into the website with an existing account, or sign up with a new account. After signing in or signing up successfully, they are redirected back to the home page, with the website personalized to their username. 
    ![1](/Demo/Account/1.png)

