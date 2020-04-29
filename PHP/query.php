<?php

   class MyDB extends SQLite3
   {
      function __construct()
      {
            $this->open('..\database\database.db');
      }
   }

   function getCustomers($searchTerm = null) {
      
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      if(!$searchTerm) {
         $sql ='SELECT * from CUSTOMERS;';
      } else {
         $sql ='SELECT * FROM CUSTOMERS WHERE FIRSTNAME LIKE "'.$searchTerm.'" OR LASTNAME LIKE "'.$searchTerm.'" OR ADDRESS LIKE "'.$searchTerm.'" OR PHONE  LIKE "'.$searchTerm.'"';
      }
      $ret = $db->query($sql);
      $array = [];
      if(!$ret){
        echo $db->lastErrorMsg();
        return [];
      } else {
         while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $array[] = $row;
         }
         $db->close();
         return $array;
      }
   }
   
   
   function getPosts($searchTerm = null) {
      
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }

      if(!$searchTerm) {
         $sql ='SELECT * from Post;';
      } else {
         $sql ='SELECT * FROM Post WHERE PRODUCTNAME LIKE "'.$searchTerm.'" OR MANUFACTURER LIKE "'.$searchTerm.'" OR DESCRIPTION LIKE "'.$searchTerm.'" OR PRICE LIKE "'.$searchTerm.'"';
      }
      $ret = $db->query($sql);
      $array = [];
      if(!$ret){
        echo $db->lastErrorMsg();
        return [];
      } else {
         while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $array[] = $row;
         }
         $db->close();
         return $array;
      }
   }
   
   
   function getEvents($searchTerm = null) {
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      
        if(!$searchTerm) {
         $sql ='SELECT * from EVENTS;';
      } else {
         $sql ='SELECT * FROM EVENTS WHERE EVENTNAME LIKE "'.$searchTerm.'" OR DESCRIPTION LIKE "'.$searchTerm.'" OR LOCATION LIKE "'.$searchTerm.'" OR DATE LIKE "'.$searchTerm.'"';
      }
      $ret = $db->query($sql);
      $array = [];
      if(!$ret){
        echo $db->lastErrorMsg();
        return [];
      } else {
         while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $array[] = $row;
         }
         $db->close();
         return $array;
      }
   }
   
   
   
   function addCustomer($customerName) {
      
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
         $sql =   'INSERT INTO Customer (NAME) 
                  SELECT * FROM (SELECT "'.$customerName.'") AS TEMP 
                  WHERE NOT EXISTS 
                  ( SELECT NAME FROM Customer WHERE NAME = "'.$customerName.'") 
                  LIMIT 1 ;';
         $db->query($sql);
   }
   
   
   function addPost( $customerName,$dishName, $submitCategory, $submitDescription) {
      
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
  
      $sql ='INSERT INTO Post (DISHNAME, CATEGORY,DISHDESCRIPTION, CID) VALUES ("'.$dishName.'", "'.$submitCategory.'", "'.$submitDescription.'", (SELECT CID FROM Customer WHERE NAME = "'.$customerName.'"));';
      $db->query($sql);
   }
   
   
   function addQuestion($customerContactName, $contactEmail, $subject, $questionDescription) {
      
      $db = new MyDB();
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      $check = 'SELECT NAME FROM Customer WHERE NAME = "'.$customerContactName.'";';
      $result = $db -> query($check);
      if ($result){
      $sql = 'UPDATE Customer
               SET EMAIL = "'.$contactEmail.'"
               WHERE NAME = "'.$customerContactName.'";';
      $db -> query($sql);
      }
      else{
         $sql =   'INSERT INTO Customer (NAME, EMAIL) 
         SELECT * FROM (SELECT "'.$customerContactName.'", "'.$contactEmail.'") AS TEMP 
         WHERE NOT EXISTS 
         ( SELECT NAME FROM Customer WHERE NAME = "'.$customerContactName.'") 
         LIMIT 1 ;';
         $db->query($sql);
      }
      $sql ='INSERT INTO Question (SUBJECT, QUESTIONDESCRIPTION, CID) VALUES ("'.$subject.'", "'.$questionDescription.'",  (SELECT CID FROM Customer WHERE NAME = "'.$customerContactName.'"));';
      $db->query($sql);

     
   }
   
      
?>