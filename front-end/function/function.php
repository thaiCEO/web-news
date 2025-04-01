<?php 

function getTable($table_name) {
    global $conn;
    $sql = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $sql);
    
    return $result;
}



?>