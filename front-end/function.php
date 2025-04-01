<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
function getTable($table_name) {
    global $conn;
    $sql = "SELECT * FROM $table_name WHERE `status` = 1";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($result);
    
    return $result;
}

function getContent($table_name , $category_id) {
    global $conn;
    $sql = "SELECT * FROM $table_name WHERE `category` = '$category_id' ORDER BY `id` ASC LIMIT 3";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function getById($table, $id) {
    global $conn;
    if (!$id || !is_numeric($id)) {
        throw new InvalidArgumentException("Invalid ID provided.");
    }
    $query = "SELECT * FROM $table WHERE id = $id";
    return mysqli_query($conn, $query);
}


function getRelatedContent($categoryId, $contentId, $limit = 2) {

    global $conn; 

     $categoryId = (int)$categoryId;
    $contentId = (int)$contentId;

    
    // SQL query to get related products
    $query = "SELECT * FROM content WHERE category = $categoryId AND id != $contentId LIMIT $limit";
    
    $result = mysqli_query($conn, $query);
    $relatedContents = [];
    
    // Fetch products and store them in an array
    if ($result) {
        while ($content = mysqli_fetch_assoc($result)) {
            $relatedContents[] = $content;
        }
    }
    
    return $relatedContents;
}


function getLatestNews() {
    global $conn;
    $sql = "SELECT * FROM content ORDER BY `id` DESC LIMIT 2";
    $result = mysqli_query($conn, $sql);

    return $result;
}


function trendingNews($limit) {
    global $conn;
    $sql = "SELECT * FROM content ORDER BY `id` DESC LIMIT $limit";
    $result = mysqli_query($conn, $sql);

    return $result;
}
?>