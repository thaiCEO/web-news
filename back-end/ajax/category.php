<?php 
// include("../config.php");
$conn = mysqli_connect("localhost","root","","cms_news");
header("Content-Type: application/json");

$type = $_GET['type'];

switch ($type) {

    case 'saveCategory' : {

        $category_name = $_POST['category_name'];
        $categoty_status = $_POST['category_status'];

        $sql = "INSERT INTO `category`( `category_name`, `status`)
                    VALUES ('$category_name','$categoty_status')";
        mysqli_query($conn, $sql);

        echo json_encode([
            "status" => 200,
            "message" => "added categoty successfully",
        ]);
        break;
    }


    case 'selectCategory' : {

        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn, $sql);
        $categories = [];

        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $categories[] = $row;
            }
        }
        echo json_encode([
            "status" => 200,
            "category" => $categories,
            "message" => "added categoty successfully",
        ]);
        break;
    }

    case 'editcategory' : {
        $category_id = $_POST['category_id'];

        $sql = "SELECT * FROM category WHERE category_id = $category_id";

        $result = mysqli_query($conn, $sql);
        $category = mysqli_fetch_assoc($result);

        echo json_encode([
            "status" => 200,
            "category" => $category,
            "message" => "added categoty successfully",
        ]);
        break;
    }


    case 'updateCategory' : {

        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $category_status = $_POST['category_status'];

        $sql = "UPDATE `category` SET `category_name`='$category_name', `status`='$category_status' WHERE `category_id` = $category_id";

        mysqli_query($conn, $sql);

        echo json_encode([
            "status" => 200,
            "message" => "updated categoty successfully",
        ]);
        break;
    }

    case 'deleteCategory' : {
        $category_id = $_POST['category_id'];

        $sql = "DELETE FROM category WHERE category_id = $category_id";

        mysqli_query($conn, $sql);

        echo json_encode([
            "status" => 200,
            "message" => "deleted categoty successfully",
        ]);
        break;
    }
}

?>