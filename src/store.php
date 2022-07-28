<?php
      function store_message($question, $answer){

        $histories = file_get_contents('./histories.txt');
        $histories = json_decode($histories);
        $id = count($histories);

        $data = array(
          "id"=> $id,
          "question" => $question,
          "answer" => $answer,
          "time"=> date('m/d H:i'),
        );

        array_push($histories, $data);
        file_put_contents('./histories.txt', json_encode($histories));
        $_POST=[];
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