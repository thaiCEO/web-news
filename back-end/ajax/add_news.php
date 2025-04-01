<?php
session_start();
$conn = mysqli_connect("localhost","root","","cms_news");
header("Content-Type: application/json");


$type = $_GET['type'];

switch($type) {
    case 'uploadImage': {

        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $image_rand = rand(0,99999).".".pathinfo($image_name, PATHINFO_EXTENSION);
        $file_path = "../folder_upload_image/tmp/$image_rand";

        move_uploaded_file($image_tmp, $file_path);

    echo json_encode([
            "status" => 200,
            "image_name" => $image_rand,
            "message" => "uploadImage successfully"
        ]);
        break;
    }

    case 'cancel' : {

        $image_name = $_POST['image_name'];

        $file_path = "../folder_upload_image/tmp/$image_name";

        if(file_exists($file_path)) {
            unlink($file_path);
            
            echo json_encode([
                "status" => 200,
                "message" => "cancel uploadImage successfully"
            ]);
            break;
        }
    }


    case 'addNews' : {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $category = $_POST['category'];
        $type = $_POST['sub_category'];
        $image_name = $_POST['image_name'];
        $author = $_SESSION['username'];

        $sql = "INSERT INTO `content`( `title`, `description`, `image`, `category`, `author`, `status` , `type`) 
                 VALUES ('$title','$description','$image_name','$category','$type ','$author' , '$status')";

        mysqli_query($conn , $sql);

        $tepDir = "../folder_upload_image/tmp/$image_name";
        $uploadDir = "../folder_upload_image/upload_new/$image_name";

        if(file_exists($tepDir)) {
            copy($tepDir, $uploadDir);
            unlink($tepDir);
        }

        echo json_encode([
            "status" => 200,
            "message" => "add news successfully"
        ]);
        break;
    }

    case 'selectNews' : {
        $search = '';
        if(isset($_GET['search_item']) != '') {
            $search = $_GET['search_item'];
        }

        $page = $_GET['page'];
        $offset = ($page - 1) * 3;

        $sql = "SELECT * FROM `content` 
                INNER JOIN `category` as cate ON content.category = cate.category_id 
                WHERE `title` LIKE '%$search%' LIMIT 3 OFFSET $offset";
        $result = mysqli_query($conn, $sql);
        $news = [];
        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $news[] = $row;
            }
        }

        $sql = "SELECT * FROM `content` WHERE `title` LIKE '%$search%'";
        $result = mysqli_query($conn , $sql);
        $total_records = mysqli_num_rows($result);
        $total_pages = ceil($total_records / 4);


        echo json_encode([
            "status" => 200,
            "crrentPage" => $page,
            "News" => $news,
            "total_pages"  => $total_pages,
            "message" => "Select News successfully"
        ]);
        break;
    }

    case 'deleteNews' : {

        $id = $_POST['id'];
        $image = $_POST['image'];

        $sql = "DELETE FROM `content` WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        $uploadDir = "../folder_upload_image/upload_new/$image";

        if(file_exists($uploadDir)) {
            unlink($uploadDir);
        }

        echo json_encode([
            "status" => 200,
            "message" => "Delete News successfully"
        ]);
        break;
    }

    case 'editNews' : {
        $content_id = $_POST['content_id'];

        $sql = "SELECT * FROM `content` WHERE id = $content_id";
        $result = mysqli_query($conn, $sql);
        $news = mysqli_fetch_assoc($result);

        echo json_encode([
            "status" => 200,
            "content" => $news,
            "message" => "Edit News successfully"
        ]);
        break;
    }
 
    case 'updateNews' : {
        $id = $_POST['content_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $category = $_POST['category'];
        $sub_category = $_POST['sub_category'];
        $author = $_SESSION['username'];
        
        if (!empty($_POST['image_name'])) {
            $image_new = $_POST['image_name'];
            $old_image = $_POST['old_image'];
            $tmpDir = "../folder_upload_image/tmp/$image_new";
            $uploadDir = "../folder_upload_image/upload_new/$image_new";
    
            if (file_exists($tmpDir)) {
                copy($tmpDir, $uploadDir);
                unlink($tmpDir);
    
                if (file_exists("../folder_upload_image/upload_new/$old_image")) {
                    unlink("../folder_upload_image/upload_new/$old_image");
                }
            }
        } else {
            $image_new = $_POST['old_image'];
        }

        $sql = "UPDATE `content` SET `title`='$title',`description`='$description',`image`='$image_new',`category`='$category', `author`='$author' , `status`='$status',`type`='$sub_category' WHERE id = $id";

        mysqli_query($conn, $sql);


        echo json_encode([
            "status" => 200,
            "message" => "Update News successfully"
        ]);
        break;
    }
}

?>