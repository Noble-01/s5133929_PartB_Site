<!DOCTYPE html>
<?php
    //request php file for queries 
    require_once '..\PHP\query.php';
    if (isset($_GET['questionName'])){
      $search = $_GET['questionName'];
      $questions = getQuestions($search);
      }
   else{
      $questions = getQuestions();
   }

?>
<html>
   <head>
      <meta charset="utf-8">
      <!-- link stylesheets -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="..\StyleSheet\styles.css">
      <style>      
         table, th, td{
            border: 1px solid #ddd;
            padding: 8px;
         }
         .questionForm{
            display:flex;
            width:30%;
            align-content:space-between;
         }
      </style>
   </head>
   <body>
      <header>
         <!-- NavBar-->
         <nav class="navbar ">
            <a href="index.php"><img src="..\Images\theFullEnchilada.png" class ="logoImage" alt="Logo"></a>
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
         <div class ="centerColumn">
            <h3>Questions submitted</h3>
         </div>
         <div class ="centerColumn">
            <form method = "get" action = "" class = "questionForm">
               <input  type="text" name = "questionName" id = "questionName">
               <input style="margin-left:10px;" type="submit" value="Look up name">
            </form>
         </div>
         <!--table displays all questions submitted to website-->
         <div class ="centerColumn">
            <table style="width:70%">
            <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Subject</th>
               <th>Description</th>
            </tr>
               <?php
                  foreach ($questions as $question){
                     echo "<tr>";
                     echo "<td>" . $question['NAME']."</td>";
                     echo "<td>" . $question['EMAIL']."</td>";
                     echo "<td>" . $question['SUBJECT']."</td>";
                     echo "<td>" . $question['QUESTIONDESCRIPTION']."</td>";
                     echo "</tr>";
                  }
               ?>
            </table>
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