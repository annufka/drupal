<?php
    session_start();

    require_once 'connection.php';
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $data = array('email'=>$email);
        $sql = $conn->prepare('SELECT * from `Users` WHERE email = :email');
        $sql->execute($data);
        // если пользователя в базе нет
        if ($sql->fetch(PDO::FETCH_ASSOC) === false){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $data = array('email'=>$email, 'psw'=>$password);
            $sql = $conn->prepare("INSERT INTO `Users` (`email`, `password`) values (:email, :psw)"); 
            $sql->execute($data);

            $_SESSION['auth'] = true;
            $_SESSION['username'] = $email;
            header("Location:index.php");
        } else { 
            // пользователь существует, регистрация не нужна
            header('HTTP/1.1 400 Bad Request', true, 400);
        }
      }
    //   $sql = $conn->query('SELECT * from `Users`');  
    //   $sql->setFetchMode(PDO::FETCH_ASSOC);  
    //   $json = json_encode($sql->fetchAll());
    //   echo $json;
?>