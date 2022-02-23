<?php

    session_start();
    require_once 'connection.php';

    $data = array("email"=>$_SESSION["username"]);
    $sql = $conn->prepare('SELECT `user_id` from `Users` WHERE email = :email');
    $sql->execute($data);
    $user_id = $sql->fetch(PDO::FETCH_ASSOC);
    $user_id = $user_id['user_id'];

    if (!empty($_POST['new_task'])) {

      $task = $_POST['new_task'];
      // $_SESSION["ToDo"][] = [$task, false];
      $data = array('user'=>$user_id, 'task'=>$task, 'done'=>0);  
      $sql = $conn->prepare("INSERT INTO `Tasks` (`user_id`, `description`, `done`) values (:user, :task, :done)"); 
      $sql->execute($data);
    }

    $data = array('user'=>$user_id);
    $sql = $conn->prepare('SELECT * from `Tasks` WHERE `user_id` = :user');  
    $sql->execute($data);
    $json = json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    // $json = json_encode( $_SESSION["ToDo"]);
    echo $json;
?>