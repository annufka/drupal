<?php
$task = $_POST["task"];
$file = 'tasks.txt';
$current = file_get_contents($file);
file_put_contents($file, $task . PHP_EOL, FILE_APPEND | LOCK_EX);
header('Location: index.php');
