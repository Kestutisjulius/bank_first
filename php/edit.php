<?php
if (isset($_POST['edit'])) {
    date_default_timezone_set("Europe/Vilnius");
    $current_data = file_get_contents(__DIR__ . '/../data/users.json');
    $arr_data = json_decode($current_data, true);
    $sessionSum = number_format(floatval($_POST['sum_in']),2);
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
    $lastTransaction[] = 'Time|: '.Date("Y-m-d H:i:s").' sum|: '. number_format(floatval($_POST['sum_in']), 2);
    $recordLine = [
        'id' => $currentUser['id'],
        'Avatar name' => $_POST['avatar_name'],
        'Name' => $_POST['name'],
        'Surname' => $_POST['sname'],
        'Gender' => $_POST['gndr'],
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
/** ------------------------------------------ORDER----------------------------------------------------------------- */
if (isset($_POST['orderDo'])){

    date_default_timezone_set("Europe/Vilnius");
    $current_data = file_get_contents(__DIR__ . '/../data/users.json');
    $arr_data = json_decode($current_data, true);
    $sessionSum = number_format(floatval($_POST['sum']),2);

    print_r($_POST['name']);
    print_r($_POST['sum']);
    $cUser = [];
    $n_arr = [];
    foreach ($arr_data as $key => $value){
        if ($_POST['orderDo'] == $value['id']){
            $cUser = $value;
        } else{
            $n_arr[] = $value;
        }
    }
    $changeSum = $cUser['Sum_input']-$_POST['sum'];
    $lastTransaction[] = 'Time|: '.Date("Y-m-d H:i:s").' sum|: '. number_format(floatval(-$_POST['sum']), 2);
    $recordLine = [
        'id' => $_POST['orderDo'],
        'Avatar name' => $cUser['avatar_name'],
        'Name' => $cUser['name'],
        'Surname' => $cUser['sname'],
        'Gender' => $cUser['Gender'],
        'Sum_input' => number_format($changeSum,2),
        'Additional_info' => $cUser['user_info'],
        'Data&Time' => $lastTransaction
    ];

    $n_arr[] = $recordLine;
    $tUser =[];
    $final = [];
    foreach ($arr_data as $key => $value){
        if ($_POST['name'] == $value['id']){
            $tUser = $value;
        } else{
            $final[] = $value;
        }
    }

    $changeTsum = $tUser['Sum_input']+$_POST['sum'];
    $lastTtransaction[] = 'Time|: '.Date("Y-m-d H:i:s").' sum|: '. number_format(floatval($_POST['sum']), 2);
    $recordLineT = [
        'id' => $_POST['name'],
        'Avatar name' => $tUser['avatar_name'],
        'Name' => $tUser['name'],
        'Surname' => $tUser['sname'],
        'Gender' => $tUser['Gender'],
        'Sum_input' => number_format($changeTsum,2),
        'Additional_info' => $tUser['user_info'],
        'Data&Time' => $lastTtransaction
    ];
    $final[] = $recordLineT;




    $updated_data = json_encode($final);

    if (!file_exists(__DIR__ . '/../data/users.json')) {
        file_put_contents(__DIR__ . '/../data/users.json', json_encode([]));
    }
    file_put_contents(__DIR__ . '/../data/users.json', $updated_data);



    header('Location: http://localhost/bank_first/?u=1');
    die;
}

