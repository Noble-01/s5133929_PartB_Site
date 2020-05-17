<!DOCTYPE html>
<?php
   //request for php file containing all queries
      require_once '..\PHP\query.php';
      //if the form is submitted execute the following code
      if (isset($_POST['submitPost'])){
         //retrieve the following values from the form and assign to a variable
         $customerName = $_POST['customerName'];
         //func adds new customer to db
         //-Parameter $customerName: Name of customer
         addCustomer($customerName);
         //retrieve the following values from the form and assign to a variable
         $dishName = $_POST['dishName'];
         $location = $_POST['location'];
         $submitCategory = $_POST['submitCategory'];
         $submitDescription = $_POST['submitDescription'];
         /**
          * check if a file is uploaded into the form and encode it
          * else let the file string be empty
          */
         if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
            $file = addslashes($_FILES['image']['tmp_name']);
            $file = file_get_contents($file);
            $file = base64_encode($file);
            
         }
         else{
            $file = '';
         }
         $rating = $_POST['testRating'];
         /**
          * func adds post to db
          * -Parameter $customerName: name of customer posting
          * -Parameter $dishName: name of dish
          * -Parameter $location: location food was eaten at
          * -Parameter $submitCategory: option of pizza, sushi, steak or enchilada
          * -Parameter $file: image file
          * -Parameter $rating: rating of food
          * -Parameter $submitDescription: description of the food
          */
         addPost($customerName,$dishName,$location, $submitCategory,$file, $rating, $submitDescription);
   
      }
   
   ?>
<html>
   <head>
      <!--connects all style sheets and sets the char set-->
      <meta charset="utf-8">
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
      <div class="container submitBackground">
         <div class = "main">
            <!-- submit form-->
            <form class=" submitForm" id = "submitForm" name = "submitForm" action="" method="POST" enctype = "multipart/form-data">
               <div class="centerColumn">
                  <!-- submit content-->
                  <fieldset class = "submitFormGroup">
                     <legend>Submit Post</legend>
                     <label>Dish Name</label>
                     <input   type="text" name="dishName" id = "dishName" placeholder="Dish name" required/>
                     <label>Location</label>
                     <input   type="text" name="location" id = "location" placeholder="suburb, state, address, store.." required/>
                     <label for ="submitCategory">Category</label>
                     <select id = "submitCategory" name = "submitCategory" required>
                        <option value = "steak">Steak</option>
                        <option value = "sushi">Sushi</option>
                        <option value = "pizza">Pizza</option>
                        <option value = "enchilada">Enchilada</option>
                     </select>
                     <label for = "image">Upload Image:</label>
                     <input type="file" id="image" name="image">
                     <div class="row">
                        <br>
                        <label for = "rating">Rating of dish:</label>
                        <div class="stars" id = "rating" name = "rating" data-rating="1">
                           <span  class="star">&nbsp;</span>
                           <span  class="star">&nbsp;</span>
                           <span  class="star">&nbsp;</span>
                           <span  class="star">&nbsp;</span>
                           <span  class="star">&nbsp;</span>
                        </div>
                     </div>
                     <!-- hidden input for holding the value for rating-->
                     <input type="hidden" id="testRating" name="testRating" value="">
                     <br>
                     <label for = "customerName">Name</label>
                     <input   type="text" name="customerName" id = "customerName" placeholder="Full Name..." required/>
                     <label for = "submitDescription" >Description</label>
                     <textarea name = "submitDescription" id = "submitDescription" class="submitTextArea" cols="8" maxlength="200"  placeholder="Meal was eaten?" required></textarea>
                     <!-- onClick execute JS function to set value for rating -->    
                     <input type="submit" id = "submitPost" name = "submitPost" onclick = "return setValue();"/>
                  </fieldset>
               </div>
            </form>
         </div>
      </div>
      <!---footer-->
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
                        <a href="contactUs.php">Contact US</a>	
                     </li>
                     <li>	
                        <a href="aboutUs.html">About US</a>	
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
   //setting rating to be used in the db
         let rating = 0;
            //initial setup of stars on the form
            document.addEventListener('DOMContentLoaded', function(){
                let stars = document.querySelectorAll('.star');
                stars.forEach(function(star){
                    star.addEventListener('click', setRating); 
                });
                
                let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
                let target = stars[rating - 1];
                //when user clicks on star execute function to update number of stars/rating
                target.dispatchEvent(new MouseEvent('click'));
            });
            //colours in stars based on the star selected from left to right
            function setRating(ev){
               //intial setup of all variables to be used for showing stars
                let span = ev.currentTarget;
                let stars = document.querySelectorAll('.star');
                let match = false;
                let num = 0;
                //for loop to either remove or add stars to the form
                stars.forEach(function(star, index){
                    if(match){
                       //remove coloured star
                        star.classList.remove('rated');
                    }else{
                       //add coloured star
                        star.classList.add('rated');
                    }
                    //are we currently looking at the span that was clicked
                    if(star === span){
                        match = true;
                        num = index + 1;
                        //set the rating of current form 
                        rating = num;
                    }
                });
                document.querySelector('.stars').setAttribute('data-rating', num);
            }
            //func sets the element id testRating with the value of the submited rating for the food
            function setValue(){
               document.submitForm.testRating.value = rating;
            }
   
         
</script>