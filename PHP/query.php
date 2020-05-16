<?php

   class MyDB extends SQLite3
   {  
      //function to create connection to db
      function __construct()
      {
         //open db at file path
            $this->open('..\database\database.db');
      }
   }
   //function is used to add customers to the table Customer
   function addCustomer($customerName) {
      //create new instance of class
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully";
      }
         //insert customer into table if he doesn't exist already in the db
         $sql =   'INSERT INTO Customer (NAME) 
                  SELECT * FROM (SELECT "'.$customerName.'") AS TEMP 
                  WHERE NOT EXISTS 
                  ( SELECT NAME FROM Customer WHERE NAME = "'.$customerName.'") 
                  LIMIT 1 ;';
         //execute query in the database
         $db->query($sql);
   }
   
   // function adds posts to table Post
   function addPost( $customerName,$dishName, $location, $submitCategory, $file, $rating, $submitDescription) {
      
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      //insert post into table with foriegn key of the customer that has submitted the post
      $sql ='INSERT INTO Post (DISHNAME, LOCATION,CATEGORY,IMAGE,RATING, DISHDESCRIPTION, CID) 
            VALUES ("'.$dishName.'","'.$location.'", "'.$submitCategory.'", "'.$file.'","'.$rating.'","'.$submitDescription.'", 
            (SELECT CID FROM Customer WHERE NAME = "'.$customerName.'"));';
      $db->query($sql);
   }
   
   //function adds questions to the table Question
   function addQuestion($customerContactName, $contactEmail, $subject, $questionDescription) {
      
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      //query to check if customer already exists in the Customer table
      $check = 'SELECT NAME FROM Customer WHERE NAME LIKE "'.$customerContactName.'";';
      $result = $db -> query($check);
      //if a record is returned then the customer must already be registered
      //update customers email in Customer table
      if ($result){
         $sql = 'UPDATE Customer SET EMAIL = "'.$contactEmail.'" WHERE NAME LIKE "'.$customerContactName.'";';
         $db -> query($sql);
      }
      //if customer is not in table then add his name and email to Customer table where name doesn't exist
      //if record already exists this sql statment does replaces nothing
      $sql =   'INSERT INTO Customer (NAME, EMAIL) 
      SELECT * FROM (SELECT "'.$customerContactName.'", "'.$contactEmail.'") AS TEMP 	       
      WHERE NOT EXISTS 	         
      ( SELECT NAME FROM Customer WHERE NAME = "'.$customerContactName.'") 
      LIMIT 1 ;';
      $db -> query($sql);

      //insert question into table Question
      $sql ='INSERT INTO Question (SUBJECT, QUESTIONDESCRIPTION, CID) VALUES ("'.$subject.'", "'.$questionDescription.'",  (SELECT CID FROM Customer WHERE NAME LIKE "'.$customerContactName.'"));';
      $db->query($sql);
   }
   
   //function retrieves 4 random records from Post table for the index.php
   function getRandomRecords($searchTerm = null){
      $db = new MyDB();
      $array = [];
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      //return 4 random records from Post
      if(!$searchTerm) {
         $sql ='SELECT * FROM Post P, Customer C WHERE C.CID == P.CID ORDER BY RANDOM() LIMIT 4';

      } else {
         //return all records from Post
         //shouldn't really do this but just in case
         //executed only if something goes wrong when executing function
         $sql ='SELECT * from Post;';
      }
      //retrieve returned results
      $ret = $db->query($sql);
     
      //if no results are returned display error message
      if(!$ret){
        echo $db->lastErrorMsg();
        //return empty array
        return [];
      } else {
         //let returned records be placed into an array
         while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $array[] = $row;
         }
         //close database
         $db->close();
         //return array with 4 posts
         return $array;
      }
   }
   function getQuestions($searchTerm = null){
      $db = new MyDB();
      $array = [];
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      //if user doesn't search for name reutrn all questions back
      if (!$searchTerm) {
         $sql = 'SELECT * FROM Question Q, Customer C WHERE C.CID = Q.CID';
      }
      //search for questions posted by user's name
      else{
         $sql = 'SELECT * FROM Question Q, Customer C WHERE C.CID = Q.CID AND NAME LIKE "%'.$searchTerm.'%"';
      }
       //retrieve returned results
       $ret = $db->query($sql);
     
       //if no results are returned display error message
       if(!$ret){
         echo $db->lastErrorMsg();
         //return empty array
         return [];
       } else {
          //let returned records be placed into an array
          while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
             $array[] = $row;
          }
          //close database
          $db->close();
          //return array with 4 posts
          return $array;
       }
   }
?>