<?php
    session_start();

    if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
        
        require_once 'connection.php';
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data = array('email'=>$email);
            $sql = $conn->prepare('SELECT * from `Users` WHERE email = :email');
            $sql->execute($data);
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            // если пользователя в базе нет
            if ( !$user ) {
                header('HTTP/1.1 404 Not Found', true, 404);
            } else {
                if (password_verify($password, $user["password"])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['username'] = $email;
                    header('HTTP/1.1 200 OK', true, 200);
                    // header("location: index.php");
                } else {
                    header('HTTP/1.1 401 Unauthorized', true, 401);
                }
            }
        }

      } else {
        header("HTTP/1.1 200 OK");
      }
      ?>