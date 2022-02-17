<?php
    session_start();
    if (!empty($_POST['new_task'])) {
      $task = $_POST['new_task'];
      $_SESSION["ToDo"][] = [$task, false];
    }
    $json = json_encode( $_SESSION["ToDo"]);
    echo $json;
?>