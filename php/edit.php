<?php
if (isset($_POST['edit'])) {
    date_default_timezone_set("Europe/Vilnius");
    $current_data = file_get_contents(__DIR__ . '/../data/users.json');
    $arr_data = json_decode($current_data, true);
    $sessionSum = floatval($_POST['sum_in']);
    $currentUser = [];
    $p = $_POST['hidden'];
    $new_arr = [];
    foreach ($arr_data as $key => $value){
            if ($p == $value['id']){
                $currentUser = $value;
            } else{
                $new_arr[] = $value;
            }
        }
    $cash = $currentUser['Sum_input'];
    $lastTransaction = $currentUser['Data&Time'];
    $lastTransaction[] = 'Time|: '.Date("Y-m-d H:i:s").' sum|: '. floatval($_POST['sum_in']);
    $recordLine = [
        'id' => $currentUser['id'],
        'Avatar name' => $_POST['avatar_name'],
        'Name' => $_POST['name'],
        'Surname' => $_POST['sname'],
        'Gender' => (isset($_POST['gender'])) ? $_POST['gender'] : 'unknown',
        'Sum_input' => $cash + $sessionSum,
        'Additional_info' => $_POST['user_info'],
        'Data&Time' => $lastTransaction
    ];

    $new_arr[] = $recordLine;
    $updated_data = json_encode($new_arr);

    if (!file_exists(__DIR__ . '/../data/users.json')) {
        file_put_contents(__DIR__ . '/../data/users.json', json_encode([]));
    }
    file_put_contents(__DIR__ . '/../data/users.json', $updated_data);

    header('Location: http://localhost/bank_first/?u=1');
    die;
}
