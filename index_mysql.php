<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <title>Document</title> 
</head>
<body>
  <div class="body-container">
    <div class="split-left">
      <div class="message-box">
        <div class="container">
            <img class='bot' src='./img/bot.png' alt='Bot'>
            <p>Hello. How can I help you today?</p>
            <span class='time-right'><?php echo date("m d H:i") ?> </span>
        </div>
    
  
  <?php
    include './src/mysql_ver/store.php';
    include './src/mysql_ver/show_histories.php';
  ?> 
  </div>

  <form class="stick-bottom" action="" method="post">
      <input  type="text" name="q_message" placeholder="please input question">
      <input  type="submit">
  </form>
  
</div>


<div class="split-right">

  <div class="table-container">
    <?php include './src/mysql_ver/search.php'; ?>
  </div>

  <form class="stick-bottom"  action="" method="post">
    <input class="form-control" type="text" name="key_word" placeholder="please iput key words to search history">
    <input class="btn btn-primary mb-3" type="submit">
  </form>

</div>


   
    <hr />
   
    
  
</body>
</html>
