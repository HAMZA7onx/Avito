<?php
    /* DATA BASE MANAGEMENT start */
    $conn = new mysqli('localhost', 'root', '');

    // Create avito_users database if it doesn't exist
    $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS `avito_users`";
    $conn->query($sqlCreateDatabase);

    // Select the avito_users database
    $conn->select_db('avito_users');

    // Create a table (replace 'your_table' and the column names/types accordingly)
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS `users` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL, 
        password VARCHAR(50) NOT NULL, 
    )";
    $conn->query($sqlCreateTable);

    // Insert data into the table (replace 'your_table' and values accordingly)
    $sqlInsertData = "INSERT INTO `users` (`username`, `email`) VALUES
        ('hamza', 'hamza@example.com'),
        ('meski', 'meski@example.com')";
    $conn->query($sqlInsertData);

    $conn->close();
    /* DATA BASE MANAGEMENT end */
?>