<?php
//this php file was created for the php pages in the sub folder Categories as they can not connect to the db due to a different filepath
class MyDB extends SQLite3
   {
        //function to create connection to db
      function __construct()
      {
         //open db at file path
            $this->open('..\..\database\database.db');
      }
   }
   //function returns sushi posts from the table Post for food pages in the sub folder Categories
   function getSushiPosts($searchTerm = null){
      $db = new MyDB();
      $array = [];
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      
      if(!$searchTerm) {
         //return records from table Post with the same category of the page Sushi
         //also return the customer name and email that sent in the post
         $sql ='SELECT * FROM  Post P, Customer C WHERE CATEGORY LIKE "sushi" AND C.CID == P.CID';

      } else {
         //if dish name has been searched then retrieve the dish
         $sql ='SELECT * from Post P, Customer C WHERE DISHNAME LIKE "%'.$searchTerm.'%" AND C.CID == P.CID';

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
     //function returns pizza posts from the table Post for food pages in the sub folder Categories
     function getPizzaPosts($searchTerm = null){
      $db = new MyDB();
      $array = [];
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      
      if(!$searchTerm) {
         //return records from table Post with the same category of the page Pizza
         //also return the customer name and email that sent in the post
         $sql ='SELECT * FROM  Post P, Customer C WHERE CATEGORY LIKE "pizza" AND C.CID == P.CID';

      } else {
         //if dish name has been searched then retrieve the dish
         $sql ='SELECT * from Post P, Customer C WHERE DISHNAME LIKE "%'.$searchTerm.'%" AND C.CID == P.CID';

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
     //function returns steak posts from the table Post for food pages in the sub folder Categories
     function getSteakPosts($searchTerm = null){
      $db = new MyDB();
      $array = [];
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      
      if(!$searchTerm) {
         //return records from table Post with the same category of the page Steak
         //also return the customer name and email that sent in the post
         $sql ='SELECT * FROM  Post P, Customer C WHERE CATEGORY LIKE "steak" AND C.CID == P.CID';

      } else {
         //if dish name has been searched then retrieve the dish
         $sql ='SELECT * from Post P, Customer C WHERE DISHNAME LIKE "%'.$searchTerm.'%" AND C.CID == P.CID';

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
     //function returns enchilada posts from the table Post for food pages in the sub folder Categories
     function getEnchiladaPosts($searchTerm = null){
      $db = new MyDB();
      $array = [];
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      
      if(!$searchTerm) {
         //return records from table Post with the same category of the page Enchilada
         //also return the customer name and email that sent in the post
         $sql ='SELECT * FROM  Post P, Customer C WHERE CATEGORY LIKE "enchilada" AND C.CID == P.CID';

      } else {
         //if dish name has been searched then retrieve the dish
         $sql ='SELECT * from Post P, Customer C WHERE DISHNAME LIKE "%'.$searchTerm.'%" AND C.CID == P.CID';

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
   