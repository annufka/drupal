<?php
    session_start();
    $task_id = $_POST['task_id'];
    // $task = $_SESSION["ToDo"][$task_id][0];
    // $task_done = $_SESSION["ToDo"][$task_id][1];
    // $_SESSION["ToDo"][$task_id][1] = !$task_done;
    // $json = json_encode( $_SESSION["ToDo"]);
    require_once 'connection.php';

    $data = array("task_id"=>$task_id);
    $sql = $conn->prepare('SELECT `done` from `Tasks` WHERE task_id = :task_id');
    $sql->execute($data);
    $task_done = $sql->fetch(PDO::FETCH_ASSOC);
    $task_done = $task_done['done'];

    $data = array('task_id' => $task_id, 'task_done' => $task_done == "1" ? 0 : 1);
    $sql = $conn->prepare("UPDATE `Tasks` SET `done` = :task_done WHERE `task_id` = :task_id");
    $sql->execute($data);

    $sql = $conn->query('SELECT * from `Tasks`');  
    $sql->setFetchMode(PDO::FETCH_ASSOC);  
    $json = json_encode($sql->fetchAll());
    echo $json;
?>