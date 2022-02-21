<?php
    session_start();
    $task_id = $_POST['task_id'];
    // unset($_SESSION["ToDo"][$task_id]);
    // $json = json_encode( $_SESSION["ToDo"]);
    require_once 'connection.php';

    $data = array('task_id' => $task_id);
    $sql = $conn->prepare("DELETE FROM `Tasks` WHERE task_id = :task_id");
    $sql->execute($data);

    $sql = $conn->query('SELECT * from `Tasks`');  
    $sql->setFetchMode(PDO::FETCH_ASSOC);  
    $json = json_encode($sql->fetchAll());
    echo $json;
?>