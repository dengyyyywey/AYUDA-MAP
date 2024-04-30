<?php

session_start();

if(isset($_GET['id'])) {
    include("connection.php");

    $id = $_GET["id"];
    
    $sql = "DELETE FROM beneficiaries WHERE user_id = $id";
    if ($database->query($sql) === TRUE) {
        
        header("location: bene.php");
        exit;
    } else {
        echo "Error deleting record: " . $database->error;
    }
} else {
    echo "No user_id parameter provided.";
}

?>
