<?php 
    /* DATA BASE MANAGEMENT start */
    $conn = new mysqli('localhost', 'root', '');

    // Create avito_users database if it doesn't exist
    $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS `products_db`";
    $conn->query($sqlCreateDatabase);

    // Select the avito_users database
    $conn->select_db('products_db');

    // Create a table (replace 'your_table' and the column names/types accordingly)
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS `products` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(100) NOT NULL,
        product_name VARCHAR(50) NOT NULL, 
        product_price VARCHAR(50) NOT NULL
    )";
    $conn->query($sqlCreateTable);

    $conn->close();
?>