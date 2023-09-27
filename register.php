<?php
require_once './text_keep/database.php';
$register = new Database();
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $register->insert('register',['name'=>$name,'gender'=>$gender,'phone_number'=>$phone,'email'=>$email,'password'=>$pass]);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>register</title>
</head>
<body>
    <section>
        <div class="form-box">
          <div class="form-value">
            <form action="index.php" method="post">
              <h2>Register</h2>
              <div class="inputbox">
                <input type="name" name="name" required >
                <label for="">Name</label>
              </div>
              <div class="inputbox">
                <select name="gender">
                  <option value="Male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="inputbox">
                <input type="tel" name="phone" required >
                <label for="">Phone Number</label>
              </div>
              <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="email" required >
                <label for="">Email</label>
              </div>
              <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password" required >
                <label for="">Password</label>
              </div>
              <button name="register">Register</button>
              <div class="register">
                <p>Already have a account ? <a href="login.php">Log in</a></p>
              </div>
            </form>
          </div>
        </div>
      </section>
      <!-- partial -->
        <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
      <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
</body>
</html>