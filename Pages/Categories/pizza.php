<!DOCTYPE html>
<?php
   require_once '..\..\PHP\categoryQueries.php';
   $request = 'pizza';
   $posts = getPosts($request);
?>
<html>
   <head>
      <meta charset="utf-8">
      <!-- Boostrap -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="..\..\StyleSheet\styles.css">
   </head>
   <body>
      <header>
         <!-- NavBar-->
         <nav class="navbar ">
            <a class="centerStuff" href="..\index.html"><img src="..\..\Images\theFullEnchilada.png" class ="logoImage" alt="Logo"></a>
            <ul class="navbar-nav ">
               <div class = "moveNavItems">
                  <li class="nav-item ">
                     <a class="nav-link " href="..\food.html">Food</a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link  "  href="..\submit.php">Submit</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="..\contactUS.php">Contact Us</a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link "  href="..\aboutUs.html">About Us</a>
                  </li>
               </div>
               <li class = "searchBar">
                  <input  name = "search" type="search" placeholder="Search.." aria-label="Search">
               </li>
            </ul>
         </nav>
         <script>
         //initial setup
         document.addEventListener('DOMContentLoaded', function(){
             let stars = document.querySelectorAll('.star');
             stars.forEach(function(star){
                 star.addEventListener('click', setRating); 
             });
             
             let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
             let target = stars[rating - 1];
         });
         
         function setRating(ev){
             let span = ev.currentTarget;
             let stars = document.querySelectorAll('.star');
             let match = false;
             let num = 0;
             stars.forEach(function(star, index){
                 if(match){
                     star.classList.remove('rated');
                 }else{
                     star.classList.add('rated');
                 }
                 //are we currently looking at the span that was clicked
                 if(star === span){
                     match = true;
                     num = index + 1;
                 }
             });
             document.querySelector('.stars').setAttribute('data-rating', num);
         }

      </script>
      </header>
      <div class="container">
         <div class="main">
            <div class = "foodCards">
            <?php foreach ($posts as $post) :?>
            <div class="card">
            
            <?php 
            if ($post['IMAGE'] == ''){
               echo '<img width = "100%" src = "..\..\Images\pizzaFood.jpg">';
            }
            else{
               echo '<img width = "100%" src="data:image;base64, '.$post['IMAGE'].'"/>';
            }
            ?>
               <div class="cardContainer">
                  <h4><b><?php echo $post['DISHNAME'] ?></b></h4> 
                  <?php
                     for($x=1;$x<= intval($post['RATING']);$x++) {
                        echo '<img src = ..\..\Images\filledStar.png width = 14% >';
                     }
                     while ($x<=5) {
                        echo '<img src = ..\..\Images\emtpyStar.png width = 11% style = "margin-bottom:0.25em; padding-left:0.5em;">';
                        $x++;
                     }
                  ?>
                  <p><?php echo $post['DISHDESCRIPTION'] ?></p> 
               </div>
            </div>
            <?php endforeach; ?>
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