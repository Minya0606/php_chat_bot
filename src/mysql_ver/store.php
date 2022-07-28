<?php
  function store_message($question, $answer){
       
    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'chat_bot';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if (!empty($conn->connect_error)) {
      die('資料庫連線錯誤:' . $conn->connect_error);
    }

    $sql = "INSERT INTO histories (`questions`, `answers`) 
      VALUES ('".$question."','".$answer."');";
    
    if($conn->query($sql) === TRUE){
       $_POST=[];
    }
    else {
      echo "ERROR: ".$conn->error;
    }
  }

      if(isset($_POST["q_message"])){
        if($_POST["q_message"] == ""){
          $alert = "No message";
          return;
        }
        $question = $_POST['q_message'];
        $url = 'https://bot.hithot.cc/wise/qa-ajax.jsp?id=php-test-0001';
        $data = array('apikey' => '102d78d84e244ad80827', 'q' => $question);
        
        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $result = json_decode($result);
        
        store_message($question, $result->output);
        $_POST=[];
      }
    ?>