<?php
    function show_message($histories){
        foreach($histories as $history){
            print("
                <div class='container darker'>
                    <img class='right' src='./img/user.png' alt='Customer'>
                    <p class='text-right'>".$history->question."</p>
                    <span class='time-left'>".$history->time."</span>
                </div>
                <div class='container'>
                    <img class='bot' src='./img/bot.png' alt='Bot'>
                    <p>".$history->answer."</p>
                    <span class='time-right'>".$history->time."</span>
                </div>
            ");
          }
    }
?>