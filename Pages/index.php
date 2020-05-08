<!DOCTYPE html>
<html>
<?php
   require_once '..\PHP\query.php';
   $posts = getRandomRecords();
?>
   <head>
      <meta charset="utf-8">
      <!-- Boostrap -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="..\StyleSheet\styles.css">
   </head>
   <body>
      <header>
         <!-- NavBar-->
         <nav class="navbar ">
            <a  href="index.html"><img src="..\Images\theFullEnchilada.png" class ="logoImage" alt="Logo"></a>
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
      <div class="container">
         <div class="main">
            <div class="mainPageBanner">
               <img class="mainPageBannerPhotos" src="https://d3i4yxtzktqr9n.cloudfront.net/web-eats-v2/63c879e3c7f539bae7d030dd37904c70.svg" alt="">
               <img class="mainPageBannerPhotos" src="https://d3i4yxtzktqr9n.cloudfront.net/web-eats-v2/53eb18f87274ca44645e2aa6ea0911f3.svg" style ="float:right;"alt="">
               <h1>Connecting food to people world wide</h1>
               <div class="searchBarFood">
                  <input id="searchFood" name="searchBar" type="text" placeholder="Enter food" /><button class="homePageSearchButton" type="button">FIND FOOD</button>
               </div>
            </div>
            <div class = "centerColumn">
               <div class = "foodCards">
                  <?php foreach ($posts as $post) :?>
                  <div class="card">
                  
                  <?php 
                  if ($post['IMAGE'] == ''){
                     echo '<img width = "100%" src = "..\Images\steakFood.jpg">';
                  }
                  else{
                     echo '<img width = "100%" src="data:image;base64, '.$post['IMAGE'].'"/>';
                  }
                  ?>
                     <div class="cardContainer">
                        <h4><b><?php echo $post['DISHNAME'] ?></b></h4> 
                        <table>
                           <tr>
                              <td style="width:30%;">
                                 <h4><b>Rating: <?php echo $post['RATING'] ?>/5</b></h4>
                              </td>
                              <td style="width:70%;">
                                 <?php
                                    for($x=1;$x<= intval($post['RATING']);$x++) {
                                       echo '<img src = ..\Images\filledStar.png width = 20% >';
                                    }
                                 ?>
                              </td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <?php endforeach; ?>
                  </div>
            </div>
         </div>
      </div>
      <footer>
         <div class="row">
            <div class="centerColumn">
               <div class="footercolumn footerleft">
                  <h3>The Full Enchilada</h3>
                  <p>Leaders in food multimedia </p>
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