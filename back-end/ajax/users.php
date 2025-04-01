<?php 
// include("../config.php");
$conn = mysqli_connect("localhost","root","","cms_news");
header("Content-Type: application/json");

$type = $_GET['type'];

switch ($type) {
    case 'saveUser': {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $role = $_POST['role'];


      $sql = "INSERT INTO `users`( `username`, `email`, `password`, `role`)
                         VALUES ('$username','$email','$password','$role');";
      mysqli_query($conn, $sql);

    echo json_encode([
            "status" => 200,
            "message" => "added successfully",
        ]);
        break;
    }


    case 'selectUser': {

      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      $users = [];

        if($result) {
          while($row = mysqli_fetch_assoc($result)) {
              $users[] = $row;
          }
        }

      echo json_encode([
        "status" => 200,
        "users" => $users,
        "message" => "select user successfully",
      ]);
      break;
    }

    case 'deleteUser' : {

      $user_id = $_GET['user_id'];
      $sql = "DELETE FROM users WHERE user_id = $user_id";
      mysqli_query($conn, $sql);


      echo json_encode([
        "status" => 200,
        "message" => "deleted user successfully",
      ]);
      break;

    }
}
?>