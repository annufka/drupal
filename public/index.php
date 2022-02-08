<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="form">
    <h2>
      Fill in the form
    </h2>

    <form action="action.php" method="post">

      <p>
        <label for="name">Name</label>
        <input type="text" id="name" name="user_name" required pattern="[A-Za-zА-Яа-яЁё]{3,}">
      </p>
      <p>
        <label for="mail">E-mail</label>
        <input type="email" id="mail" name="user_mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
      </p>
      <p>
        <label for="msg">Message</label>
        <textarea id="msg" name="user_message"></textarea>
      </p>

      <button type="submit">Send your message</button>

    </form>
</body>
</body>

</html>
</div>
</body>

</html>
</body>

</html>
</form>
</div>
</body>

</html>
