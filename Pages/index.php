<!DOCTYPE html>
<html>
   <?php
      //request php file
         require_once '..\PHP\query.php';
         //execute getRandomRecords function from php file and store returned array into var $posts
         // - Returns: array of 4 random posts
         $posts = getRandomRecords();
         ?>
   <head>
      <!-- set char set -->
      <meta charset="utf-8">
      <!-- link stylesheet -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="..\StyleSheet\styles.css">
   </head>
   <body>
      <header>
         <!-- NavBar-->
         <nav class="navbar ">
            <a  href="index.php"><img src="..\Images\theFullEnchilada.png" class ="logoImage" alt="Logo"></a>
            <ul class="navbar-nav ">
               <div class = "moveNavItems">
                  <li class="nav-item ">
                     <a class="nav-link " href="food.html">Food</a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link  "  href="submit.php">Submit</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="contactUS.php">Contact Us</a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link "  href="aboutUs.html">About Us</a>
                  </li>
               </div>
               <li class = "searchBar">
                  <input  name = "search" type="search" placeholder="Search.." aria-label="Search">
               </li>
            </ul>
         </nav>
      </header>
      <!--Page Content -->
      <div class="container">
         <div class="main">
            <!-- banner-->
            <div class="mainPageBanner">
               <img class="mainPageBannerPhotos" src="https://d3i4yxtzktqr9n.cloudfront.net/web-eats-v2/63c879e3c7f539bae7d030dd37904c70.svg" alt="banner img left">
               <img class="mainPageBannerPhotos" src="https://d3i4yxtzktqr9n.cloudfront.net/web-eats-v2/53eb18f87274ca44645e2aa6ea0911f3.svg" style ="float:right; width:100%;"alt="banner img right">
               <h1>Connecting food to people world wide</h1>
               <div class="searchBarFood">
                  <input id="searchFood" name="searchBar" type="text" placeholder="Enter food" /><button class="homePageSearchButton" type="button">FIND FOOD</button>
               </div>
            </div>
            <br>
            <div class = "centerColumn">
               <!-- slide show-->
               <div class="slideshow-container">
                  <div class="mySlides fade">
                     <img src="..\Images\steakFood.jpg" style="width:100%">
                  </div>
                  <div class="mySlides fade">
                     <img src="..\Images\pizzaFood.jpg" style="width:100%">
                  </div>
                  <div class="mySlides fade">
                     <img src="..\Images\sushiFood.jpg" style="width:100%">
                  </div>
               </div>
            </div>
            <br>
            <div style="text-align:center">
               <span class="dot"></span> 
               <span class="dot"></span> 
               <span class="dot"></span> 
               <br><br>
               <h1 >Suggested Posts</h1>
            </div>
            <div class = "centerColumn">
               <!-- 4 random posts from database  -->
               <div class = "foodCards">
                  <!-- loop through returned records from post -->
                  <?php foreach ($posts as $post) :?>
                  <div class="card" style="max-width:15%;">
                     <!-- make cards linkable to their category page -->
                     <a href = "Categories\<?php echo $post['CATEGORY']?>.php">
                        <?php 
                           //if no image is stored in database give default image to card
                              if ($post['IMAGE'] == ''){
                                 echo '<img width = "100%" alt = "default image" src = "..\Images\steakFood.jpg">';
                              }
                              //else display the encoded image in the database
                              else{
                                 echo '<img width = "100%" alt="food image for post" src="data:image;base64, '.$post['IMAGE'].'"/>';
                              }
                              ?>
                        <!-- container for card text -->
                        <div class="cardContainer">
                           <h2><?php echo $post['DISHNAME'] ?></h2>
                           <p> <b>Location: </b><?php echo $post['LOCATION'] ?> </p>
                           <table>
                              <tr>
                                 <td style="width:30%;">
                                    <h4>Rating: <?php echo $post['RATING'] ?>/5</h4>
                                 </td>
                                 <td style="width:70%;">
                                    <?php
                                       for($x=1;$x<= intval($post['RATING']);$x++) {
                                          echo '<img src = ..\Images\filledStar.png width = 20% alt ="star">';
                                       }
                                       ?>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class = "postOwnerName">
                           <p>Contact details</p>
                           <p><?php echo $post['NAME'] ?></p>
                        </div>
                        <br>
                        <div class = "postOwnerEmail">
                           <p><?php echo $post['EMAIL'] ?></p>
                        </div>
                     </a>
                  </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
      <!-- footer -->
      <footer>
         <div class="row">
            <div class="centerColumn">
               <div class="footercolumn footerleft">
                  <h3>The Full Enchilada</h3>
                  <p>Leaders in food multimedia </p>
                  <a href="Admin.php">Admin</a>	
               </div>
               <div class="footercolumn footermiddle">
                  <h3 >Support</h3>
                  <ul class="list-unstyled">
                     <li>	
                        <a href="#!">Contact US</a>	
                     </li>
                     <li>	
                        <a href="#!">About US</a>	
                     </li>
                  </ul>
               </div>
               <div class="footercolumn footerright">
                  <h3> Social Media:</h3>
                  <a href="#" class="fa fa-facebook"></a>
                  <a href="#" class="fa fa-twitter"></a>
                  <a href="#" class="fa fa-google"></a>
                  <a href="#" class="fa fa-linkedin"></a>
                  <!-- Copyright -->
               </div>
            </div>
         </div>
         <hr>
         © 2020 Copyright:
         <a href="https://google.com/"> theFullEnchilada.com</a>
      </footer>
   </body>
</html>
<script>
   //javascript code for slideshow
      var slideIndex = 0;
      showSlides();
      //function creates array for slide show and dots underneath it as well as setting time for moving images
      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        //loop through array
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        //loop through dots array setting to an "active" state using css   
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        // Change image every 5 seconds
        setTimeout(showSlides, 5000); 
      }
</script>