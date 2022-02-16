<?php
session_start();
$task_id = $_GET['task_id'];
unset($_SESSION["ToDo"][$task_id]);
header('location: index.php');