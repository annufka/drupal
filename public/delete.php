<?php
    session_start();
    $task_id = $_POST['task_id'];
    unset($_SESSION["ToDo"][$task_id]);
    $json = json_encode( $_SESSION["ToDo"]);
    echo $json;
?>