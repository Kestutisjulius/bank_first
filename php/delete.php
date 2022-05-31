<?php
if (isset($_GET['Delete'])){
    $current_data = file_get_contents(__DIR__ . '/../data/users.json');
    $arr_data = json_decode($current_data, true);
    $temp = [];
    if (sizeof($arr_data) == 1){
        $arr_data = [];
    } else{
        foreach ($arr_data as $key => $value){
            if (!($key == $_GET['Delete'])){
                $temp[] = $value;
            }
        }
    }
    $updated_data = json_encode($temp);
    file_put_contents(__DIR__ . '/../data/users.json', $updated_data);
}
    header('Location: http://localhost/bank_first/?i=1');
    die;
