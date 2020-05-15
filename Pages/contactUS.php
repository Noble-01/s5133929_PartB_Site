<!DOCTYPE html>
<?php
//request php file for queries 
   require_once '..\PHP\query.php';
   //if question form is submited execute the following code
   if (isset($_POST['submitQuestion'])){
      //retrieve the following ids from form and stpre them in variables
      $customerContactName = $_POST['customerContactName'];
      $contactEmail = $_POST['contactEmail'];
      $subject = $_POST['subject'];
      $questionDescription = $_POST['questionDescription'];
      /**execute function to add question to database from php file with the following parameters
       * - Parameter $customerContactName: name of person submitting form
       * - Parameter $contactEmail: email of customer
       * - Parameter $subject: subject of question
       * - Parameter $questionDescription: description of question
       */
      addQuestion($customerContactName,$contactEmail,$subject,$questionDescription);
   }
?>
<html>
   <head>
      <meta charset="utf-8">
      <!-- link stylesheets  -->
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
      <!-- page content -->
      <div class="container">
         <div class="main">
            <div class="contactContainer">
               <!-- banner -->
               <img class = " contactBanner" src="../Images/contactBackground.jpg" alt="bannerImage">
               <div class="bannerText">
                  <h1 style="font-size:100px">- Hello - </h1>
                  <u>
                     <p style="font-size:30px">How can we help you?</p>
                  </u>
               </div>
            </div>
            <!-- creates two columns -->
            <div class="centerColumn">
               <!-- contact information -->
               <div class=" contactLeft">

                  <p style="font-size: 14px;">197 Onslow Road</p>
                  <p style="font-size: 14px;">Shenton Park, WA 6008</p>
                  <p style="font-size: 14px;"> Australia</p>
                  <p style="font-size: 14px;">Retail & Shop Tel: 0468 858 157</p>
                  <p style="font-size: 14px;">Email: Enchilada@yahoo.com.au</p>


                  <h1 style="font-size: 14px;">Opening Hours:</h1>
                  <p style="font-size: 14px;">Monday to Friday  -  8am to 5.00pm</p>
                  <p style="font-size: 14px;"> Saturday - 8am to 1.00pm </p>
                  <p style="font-size: 14px;"> Closed Sunday & Public Holidays </p>
               </div>
               <div class=" contactRight">
                  <!-- form to submit questions -->
                  <form class = "contactForm" action="" method="POST">
                     <legend><h1>Question?</h1></legend>
                     <fieldset class="formcontainer">
                     <hr/>
                       <label for="customerName"><strong>Name</strong></label>
                       <input type="text" placeholder="Enter full name" name="customerContactName" id = "customerContactName"required>
                       <label for="contactEmail"><strong>Email</strong></label>
                       <input type="email" placeholder="Enter email" name="contactEmail" id = "contactEmail" required>
                       <label for="phone"><strong>Subject</strong></label>
                       <input type="text" placeholder="Subject of question" name="subject" id = "subject"required>
                       <label for = "questionDescription" ><strong>Description</strong></label>
                       <textarea name = "questionDescription" id = "questionDescription" class="submitTextArea" cols="8" maxlength="200"  placeholder="Question" required></textarea>
                     <br>
                     <input type="submit" id = "submitQuestion" name = "submitQuestion">
                     </fieldset>
                   </form>
               </div>
            </div>
         </div>
      </div>
      <!-- footer -->
      <footer>
         <div class="centerColumn">
            <div class="footerleft">
               <h3>The Full Enchilada</h3>
               <p>Leaders in food multimedia </p>
            </div>
            <div class="footermiddle">
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
            <div class=" footerright">
               <h3> Social Media:</h3>
               <a href="#" class="fa fa-facebook"></a>
               <a href="#" class="fa fa-twitter"></a>
               <a href="#" class="fa fa-google"></a>
               <a href="#" class="fa fa-linkedin"></a>
               <!-- Copyright -->
            </div>
         </div>
         <hr>
         © 2020 Copyright:
         <a href="https://google.com/"> theFullEnchilada.com</a>
      </footer>
   </body>
</html>