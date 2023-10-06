<?php
require_once './text_keep/database.php';
$login = new Database();
if (isset($_POST['login'])) {
  $result = $login->display('register',null,null);
  if($result){
    $email = $_POST['email'];
    $password = $_POST['password'];
    foreach ($result as $row){
      $name_id= $row['name'];
      $id= $row['id'];
      if($row['email'] == $email && $row['password'] == $password){
        header('location:http://localhost/googlekeep_php/text_keep/Text_Keep.php ?id='.$id.'&name_id='.$name_id );
      }else{
        echo 'login failed';
      }
    }
  };
}


?>





<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login form</title>
  <link rel="stylesheet" href="Login.css?">

</head>
<body>
<section>
  <div class="form-box">
    <div class="form-value">
      <form action="" method="post">
        <h2>Login</h2>
        <div class="inputbox">
          <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="email" >
          <label for="">Email</label>
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="password" name="password" >
          <label for="">Password</label>
        </div>
        <div class="forget">
          <label>
            <input type="checkbox"> Remember me
          </label>
          <label>
            <a>Forgot password?</a>
          </label>
        </div>
        <button name="login">Log in</button>
        <div class="register">
          <p>Don't have a account ? <a href="register.php">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</section>
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
</body>
</html>
