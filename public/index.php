<?php
session_start();
$_SESSION["newsession"]="Test";
$_SESSION["ToDo"] = array();
print_r($_SESSION);
print_r($_COOKIE);
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
      if (empty($_POST['task'])) {
        echo "<div class='mt-2 alert alert-warning alert-dismissible fade show' role='alert'>Вы не ввели данные</div>";
      } else {
        $task = $_POST['task'];
        $_SESSION["ToDo"][] = [$task, "false"];
      }
      print_r($_SESSION["ToDo"]);
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
          foreach ($fp as $vehicle => $task_from_session) {
            echo " $vehicle - $task_from_session";
            // echo "<li><input class='form-check-input done' type='checkbox' value=''>" . $buffer . "<button class='btn btn-delete'><i class='fa fa-trash-o' style='font-size:1pem'></i></button></li>";
        }
          ?>
        </ul>
      </div>

      <div class="py-2">
        <h3>Done</h3>
        <ul id="list-done">
          <!-- Вот сюда будет добавляться список завершенных задач -->
        </ul>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- <script src="js/main.js"></script> -->

</body>

</html>
</body>

</html>
