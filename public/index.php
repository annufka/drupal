<?php
session_start();
$_SESSION["newsession"]="Test";
if (empty($_SESSION["ToDo"])){
  $_SESSION["ToDo"] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <div class="child-container p-4">

      <h1 class="py-2">ToDo List</h1>

      <?php
      if (!empty($_POST['task'])) {
        $task = $_POST['task'];
        $_SESSION["ToDo"][] = [$task, false];
      }
      ?>
      <form method="POST">
        <div class="input-group">
          <input id="user-input" type="text" name="task" class="form-control" placeholder="Что тебе надо выполнить?">
          <input id="btn-submit" class="btn btn-outline-secondary" type="submit" value="Сохранить">
        </div>
      </form>

      <div class="py-2">
        <h3>Will do</h3>
        <ul id="list-will-do">
          
          <?php
          $fp = $_SESSION["ToDo"];
          foreach ($fp as $item => $task_from_session) {
            if ($task_from_session[1] === false){
              echo "<li>" . $task_from_session[0] . "<a class='btn btn-done' href='change_status.php?task_id=$item'><i class='fa fa-check' style='font-size:1pem'></i></a><a class='btn btn-delete' href='delete.php?task_id=$item'><i class='fa fa-trash-o' style='font-size:1pem'></i></a></li>";
            }
           }
          ?>
        </ul>

      </div>

      <div class="py-2">
        <h3>Done</h3>
        <ul id="list-done">
        <?php
          $fp = $_SESSION["ToDo"];
          foreach ($fp as $item => $task_from_session) {
            if ($task_from_session[1] === true){
              echo "<li>" . $task_from_session[0] . "<a class='btn btn-done' href='change_status.php?task_id=$item'><i class='fa fa-check' style='font-size:1pem'></i></a><a class='btn btn-delete' href='delete.php?task_id=$item'><i class='fa fa-trash-o' style='font-size:1pem'></i></a></li>";
            }
           }
          ?>
        </ul>
      </div>
    </div>
  </div>

<script>
  document.getElementById("list-will-do").addEventListener("click", function (event) {
    if (event.target.tagName == "INPUT") {
        listToDo[event.target.id].done = !listToDo[event.target.id].done;
    }
    if (event.target.tagName == "I" || event.target.tagName == "BUTTON") {
        listToDo.splice(event.target.id, 1);
    }
});
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- <script src="js/main.js"></script> -->

</body>

</html>
</body>

</html>
