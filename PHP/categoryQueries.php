<?php

class MyDB extends SQLite3
   {
      function __construct()
      {
            $this->open('..\..\database\database.db');
      }
   }
   
   function getPosts($searchTerm = null){
      $db = new MyDB();
      $array = [];
      if(!$db){
         echo '<script type="text/javascript">alert("'.$db->lastErrorMsg().'");</script>';
      } else {
         //echo "Opened database successfully\n";
      }
      if(!$searchTerm) {
         $sql ='SELECT * from Post;';
      } else {
         $sql ='SELECT * FROM Post WHERE CATEGORY LIKE "'.$searchTerm.'"';
      }
      $ret = $db->query($sql);
     
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

?>
   