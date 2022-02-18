<?php
try {  
    $DBH = new PDO("mysql:host=db;dbname=test", 'root', 'example');  
  }  
  catch(PDOException $e) {  
      echo $e->getMessage();  
  }
?>