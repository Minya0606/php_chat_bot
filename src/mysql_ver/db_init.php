<?php
    $server_name = 'localhost';
    $username = 'root';
    $password = '';

    $conn = new mysqli($server_name, $username, $password);

    if (!empty($conn->connect_error)) {
    die('資料庫連線錯誤:' . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS chat_bot";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
        $conn->close();
        
        $conn = new mysqli($server_name, $username, $password, 'chat_bot');
        $sql = "CREATE TABLE `histories` (
            `ID` INT NOT NULL AUTO_INCREMENT, 
            `questions` VARCHAR(100) NOT NULL, 
            `answers` VARCHAR(100) NOT NULL, 
            `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`ID`));";
        if ($conn->query($sql) === TRUE) {
            echo "Table histories created successfully";
        }
        else {
            echo "Error createing table: ".$conn->error;
        }
        $conn->close();
    } else {
        echo "Error creating database: " . $conn->error;
    }

?>