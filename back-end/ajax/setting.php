<?php 
// work with setting 
session_start();
$conn = mysqli_connect("localhost","root","","cms_news");
header("Content-Type: application/json");


$type = $_GET['type'];

switch ($type) {

    case 'setting_select' : {

        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];

        $sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
        $result = mysqli_query($conn , $sql);
        $row = mysqli_fetch_assoc($result);


        $sql = "SELECT * FROM `content` WHERE `author` = '$username'";
        $result = mysqli_query($conn , $sql);
        $post = mysqli_num_rows($result);

        echo json_encode([
            "status" => 200,	
            "user" => $row,
            "post" => $post
        ]);
        break;
    }

    case 'upload_profile' : {

         $profile = $_FILES['profile']['name'];
         $file_tmp = $_FILES['profile']['tmp_name'];

         $profile = rand(0,9999).".".pathinfo($profile, PATHINFO_EXTENSION);

         $path = "../folder_upload_image/tmp/$profile";
         move_uploaded_file($file_tmp, $path);

        echo json_encode([
            'status' => 200,
            'profile' => $profile,
            'message' => 'Upload profile successfully'
        ]);
        break;
    }

    case 'saveProfile' :  {

        $profile = $_POST['profile'];
        $user_id = $_SESSION['user_id'];

        $folder_tmp = "../folder_upload_image/tmp/$profile";
        $folder_upload = "../folder_upload_image/upload_Profile/$profile";

        if(file_exists($folder_tmp)) {
            copy($folder_tmp, $folder_upload);
            unlink($folder_tmp);
        }

        $sql = "UPDATE `users` SET `image` = '$profile' WHERE `user_id` = '$user_id'";
        mysqli_query($conn , $sql);

        echo json_encode([
            'status' => 200,
            'profile' => $profile,
            'message' => 'Save profile successfully'
        ]);
        break;
    }

    case 'updateUser' : {

        $user_id = $_SESSION['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $old_password = isset($_POST['old_password']) ? md5($_POST['old_password']) : '';
        $new_password = isset($_POST['new_password']) ? md5($_POST['new_password']) : '';

        if ($new_password !== '' && $old_password !== '') {
            // Scenario 1: Update with new password
            $sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id' AND `password` = '$old_password'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) == 1) {
                $update_sql = "UPDATE `users` SET `username`='$username', `email`='$email', `password`='$new_password', `phone`='$phone' WHERE `user_id`='$user_id'";
                if (mysqli_query($conn, $update_sql)) {
                    echo json_encode([
                        "status" => 200,
                        "message" => "Update user and password successfully"
                    ]);
                } else {
                    echo json_encode([
                        "status" => 500,
                        "message" => "Failed to update user and password"
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => 401,
                    "message" => "Wrong password"
                ]);
            }
        } elseif ($new_password === '' && $old_password === '') {
            // Scenario 3: Update username, email, and phone without password
            $update_sql = "UPDATE `users` SET `username`='$username', `email`='$email', `phone`='$phone' WHERE `user_id`='$user_id'";
            if (mysqli_query($conn, $update_sql)) {
                echo json_encode([
                    "status" => 200,
                    "message" => "Update user successfully"
                ]);
            } else {
                echo json_encode([
                    "status" => 500,
                    "message" => "Failed to update user"
                ]);
            }
        } else {
            // Scenario 2: Attempting to update password without providing old password
            echo json_encode([
                "status" => 400,
                "message" => "Old password is required to update to a new password"
            ]);
        }

    }

}
