<?php

function getTable( $table_name ) {
    global $conn;
    $sql = "SELECT * FROM $table_name";
    $result = $conn->query( $sql );
    if ( $result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    
}

?>