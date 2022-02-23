<?php
session_start();

if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
  header("location: login_page.php");
  exit();
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/main.js"></script>
  <script src="js/user.js"></script>
</head>

<body>

      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid" id="login">
          <div>
            <a href="login_page.php" id="btn-submit-logout" class="btn btn-outline-warning">Выйти</a>
          </div>
        </div>
      </nav>
    
  <div class="container my-4">

    <div class="child-container p-4">

	
      <h1 class="py-2">ToDo List</h1>
  
      <!-- Поле для ввода и кнопка, функция из main.js addItemToList, которая при нажатии инпута получает
        введенное значение другого инпута -->
      <div class="input-group">
        <input id="user-input" name="user-input" type="text" class="form-control" placeholder="Что тебе надо выполнить?">
        <a href="#" id="btn-submit" class="btn btn-outline-secondary">Сохранить</a>
      </div>

      <div class="py-2">
        <h3>Will do</h3>
        <ul id="list-will-do">
          <!-- Вот сюда будет добавляться список задач -->
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>
</body>

</html>