<?php

if(isset($_POST['submit'])){

$new_message = array(

    "desc" => $_POST['desc'],
    "client" => $_POST['client'],

);

if (filesize("Result_json/messages.json") == 0) {

    $first_record = array($new_message);

    $data_to_save = $first_record;

}else{

    $old_records = json_decode(file_get_contents("Result_json/messages.json"));

    array_push($old_records, $new_message);

    $data_to_save = $old_records;
}

if (!file_put_contents("Result_json/messages.json", json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)){
    
    $error = "Erro encontrado, tente novamente!!";
}else{

    $success = "Dados inseridos com sucesso!";
}

}