<?php
    session_start();
    $task_id = $_POST['task_id'];
    $task = $_SESSION["ToDo"][$task_id][0];
    $task_done = $_SESSION["ToDo"][$task_id][1];
    $_SESSION["ToDo"][$task_id][1] = !$task_done;
    $json = json_encode( $_SESSION["ToDo"]);
    echo $json;
?>