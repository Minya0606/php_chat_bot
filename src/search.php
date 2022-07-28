<?php

      if(isset($_POST["key_word"])){
        if($_POST["key_word"] == ""){
          $alert = "No key word";
          return;
        }
        $key_word = $_POST['key_word'];
        $histories = file_get_contents('./histories.txt');
        $histories = json_decode($histories);

        $search_results = array();
        foreach($histories as $history){
          if (str_contains($history->question,$key_word) || str_contains($history->answer,$key_word)){
            array_push($search_results, array(
              "question"=> $history->question,
              "answer" => $history->answer
            ));
          }
        }
        
        if(count($search_results) <= 0){
          print("
            <h3 style='text-align:center'> Tthere is no result about key word: ".$key_word."</h3>
          ");
        }
        else {
          print('<table>
          <thead>
            <tr>
              <th scope="col">Questions</th>
              <th scope="col">Answer</th>
            </tr>
          </thead>
          <tbody>');
          
          foreach($search_results as $result){
            print("
              <tr>
                <td>".$result['question']."</td>
                <td>".$result['answer']."</td>
              </tr>
            ");
          }
          
          print('
            </tbody>
            </table>
          ');
        }
       
        $_POST=[];
      }
    ?>