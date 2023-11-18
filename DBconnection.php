<?php 
    // Connecting to database:
    $conn = new mysqli('localhost', 'root', '', 'avito_users');
    $sqlSelect = "SELECT * FROM `users`"; 
    $result = mysqli_query($conn, $sqlSelect);
    $data = mysqli_fetch_all($result);
?>