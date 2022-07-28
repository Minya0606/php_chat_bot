<?php
    if(isset($_POST["key_word"])){
        if($_POST["key_word"] == ""){
            $alert = "No key word";
            return;
        }
        $key_word = $_POST['key_word'];
        $server_name = 'localhost';
        $username = 'root';
        $password = '';
        $db='chat_bot';

        $conn = new mysqli($server_name, $username, $password,$db);

        if (!empty($conn->connect_error)) {
            die('資料庫連線錯誤:' . $conn->connect_error);
        }

        $sql = "SELECT * FROM `histories`;";
        $results = $conn->query($sql);

        $key_word = $_POST['key_word'];
        $search_results = array();

        while($row  =  mysqli_fetch_array($results)){
            if (str_contains($row['questions'],$key_word) || str_contains($row['answers'],$key_word)){
                array_push($search_results, $row);
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
                <td>".$result['questions']."</td>
                <td>".$result['answers']."</td>
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