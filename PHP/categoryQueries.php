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
   //function returns posts from the table Post for food pages in the sub folder Categories
   function getPosts($searchTerm = null){
      $db = new MyDB();
      $array = [];
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      //if no arguement is given for the function return all records from table Post
      if(!$searchTerm) {
         $sql ='SELECT * from Post;';
      } else {
         //return records from table Post with the same category of the page e.g. Pizza, Sushi, Steak, Enchilada
         //also return the cutomer name and email that sent in the post
         $sql ='SELECT * FROM Post P, Customer C WHERE CATEGORY LIKE "'.$searchTerm.'" AND C.CID == P.CID';
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
   