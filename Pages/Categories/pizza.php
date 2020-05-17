<!DOCTYPE html>
<?php
   //request the php file to execute php queries
   require_once '..\..\PHP\categoryQueries.php';
   //check if user has searched up a dish name
   if (isset($_GET['foodName'])){
      $request = $_GET['foodName'];
      $posts = getPizzaPosts($request);
   }
   else{
      //return all records from table Post that have the category 'pizza'
      $posts = getPizzaPosts();
   }
   ?>
<html>
   <head>
      <meta charset="utf-8">
      <!-- link style sheets -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="..\..\StyleSheet\styles.css">
   </head>
   <body>
      <header>
         <!-- NavBar-->
         <nav class="navbar ">
            <a  href="..\index.php"><img src="..\..\Images\theFullEnchilada.png" class ="logoImage" alt="Logo"></a>
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
      </header>
      <!-- main page content -->
      <div class="container">
         <div class="main">
            <h1 style = "text-align:center;">Pizza posts</h1>
            <div class ="centerColumn">
               <!-- Form to search up posts on page by the dish name -->
               <form method = "GET" action = "" class = "questionForm">
                  <input  type="text" name = "foodName" id = "foodName" placeholder = "Search up dish name">
                  <input style="margin-left:10px;" type="submit" value="Search food name">
               </form>
            </div>
            <div class = "foodCards">
               <!--if user searches for post that doesn't have the same category as the page then it prints the following message-->
               <?php if(count($posts) == 0){
                  echo"Not posts meet your desired search";
               }?>
               <!-- print all posts retrieved in cards -->
               <?php foreach ($posts as $post) :?>
               <div class="card">
                  <?php 
                    //give default image if there is no encoded image in table for record
                     if ($post['IMAGE'] == ''){
                        echo '<img width = "100%"  alt = "default image" src = "..\..\Images\pizzaFood.jpg">';
                     }
                     else{
                        //decode image
                        echo '<img width = "100%"  alt= "image for post" src="data:image;base64, '.$post['IMAGE'].'"/>';
                     }
                     ?>
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
                              //for loop stars based on the number for rating
                                 for($x=1;$x<= intval($post['RATING']);$x++) {
                                    echo '<img src = ..\..\Images\filledStar.png width = 20% >';
                                 }
                                 ?>
                           </td>
                        </tr>
                     </table>
                     <p><?php echo $post['DISHDESCRIPTION'] ?></p>
                  </div>
                  <!-- details of user who sent in post -->
                  <div class = "postOwnerName">
                     <p>Contact details</p>
                     <p><?php echo $post['NAME'] ?></p>
                  </div>
                  <br>
                  <div class = "postOwnerEmail">
                     <p><?php echo $post['EMAIL'] ?></p>
                  </div>
               </div>
               <?php endforeach; ?>
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
                  <a href="..\Admin.php">Admin</a>	
               </div>
               <div class="footercolumn footermiddle">
                  <h3 >Support</h3>
                  <ul class="list-unstyled">
                     <li>	
                        <a href="..\contactUs.php">Contact US</a>	
                     </li>
                     <li>	
                        <a href="..\aboutUs.html">About US</a>	
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
         <p style = "text-align:center;">© 2020 Copyright:<a href="https://google.com/"> theFullEnchilada.com</a></p>
      </footer>
   </body>
</html>