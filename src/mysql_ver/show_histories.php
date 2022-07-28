<?php
    include 'db_connect.php';

    $sql = "SELECT * FROM `histories`;";
    $results = $conn->query($sql);

    while($row  =  mysqli_fetch_array($results)){
        print("
                <div class='container darker'>
                    <img class='right' src='./img/user.png' alt='Customer'>
                    <p class='text-right'>".$row['questions']."</p>
                    <span class='time-left'>".$row['date']."</span>
                </div>
                <div class='container'>
                    <img class='bot' src='./img/bot.png' alt='Bot'>
                    <p>".$row['answers']."</p>
                    <span class='time-right'>".$row['date']."</span>
                </div>
            ");
    }

    $conn->close();
?>