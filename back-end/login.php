<?php 
include '../config.php';
session_start();



if(isset($_POST['btn_login'])) {
   $username_or_email = mysqli_real_escape_string($conn, $_POST['email']);
   $email = $_POST['email'];
   $password = md5($_POST['password']);

   $sql = "SELECT * FROM users WHERE  (username = '$username_or_email' OR email = '$username_or_email') AND password = '$password'";
   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
       
         $_SESSION['login'] ==  'sucessfully';
         $_SESSION['user_id'] = $row['user_id'];
         $_SESSION['username'] = $row['username'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['role'] = $row['role'];
         $_SESSION['image'] = $row['image'];
         header("Location:index.php");
         exit();

   }else {
      $_SESSION["login"] = "error";

      if(empty($email) || empty($password)) {
         $_SESSION["message"] = "Login failed please enter email and password";
         header("Location:login.php");
         exit();
      }else {
         $_SESSION["message"] = "Login failed email or password is incorrect";
         header("Location: login.php");
         exit();
      }
   }

}


// Redirect to index.php if already logged in
if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/style/theme.css">
    
</head>
<body>
    <div class="content-login">
        <form method="post">
      
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == "error") { ?>
            <div class="form-header">
                <h3 style="color: red;">
                    <?php echo (isset($_SESSION['message'])) ? $_SESSION['message'] : ""; ?>
                </h3>
            </div>
        <?php } ?>
           
       
            <label>Name or Email</label>
            <input type="text" class="box" name="email">
            <label>Password</label>
            <input type="password" class="box" name="password">
            <div class="wrap-btn">
                <a href="register.php" class="btn">Register?</a>&ensp;
                <input type="submit" class="btn" name="btn_login" value="LOGIN">
            </div>
        </form>
    </div>
</body>
</html>

<?php

} else {
    header("Location: index.php");
}

?>