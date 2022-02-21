<?php

use function PHPSTORM_META\type;

    session_start();
    require_once 'connection.php';
    if (!empty($_POST['new_task'])) {
      $task = $_POST['new_task'];
      // $_SESSION["ToDo"][] = [$task, false];
      $data = array('task'=>$task, 'done'=>0);  
      $sql = $conn->prepare("INSERT INTO `Tasks` (`description`, `done`) values (:task, :done)"); 
      $sql->execute($data);
    }
    $sql = $conn->query('SELECT * from `Tasks`');  
    $sql->setFetchMode(PDO::FETCH_ASSOC);  
    $json = json_encode($sql->fetchAll());
    // $json = json_encode( $_SESSION["ToDo"]);
    echo $json;
?>