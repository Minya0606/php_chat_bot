<?php
    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'chat_bot';
    
    $conn = new mysqli($server_name, $username, $password,$db);
    if (!empty($conn->connect_error)) {
        die('資料庫連線錯誤:' . $conn->connect_error);
    }    
?>