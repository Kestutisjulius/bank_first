<?php
if (isset($_POST['create'])) {
    date_default_timezone_set("Europe/Vilnius");
    $current_data = file_get_contents(__DIR__ . '/../data/users.json');
    $arr_data = json_decode($current_data, true);
    $sessionSum = floatval($_POST['sum_in']);
    $cash = $arr_data['Sum_input'];
    $recordLine = [
        'id' => uniqid(),
        'Avatar name' => $_POST['avatar_name'],
        'Name' => $_POST['name'],
        'Surname' => $_POST['sname'],
        'Gender' => (isset($_POST['gender'])) ? $_POST['gender'] : 'unknown',
        'Sum_input' => $cash + $sessionSum,
        'Additional_info' => $_POST['user_info'],
        'Data&Time' => [Date("Y-m-d H:i:s"), floatval($_POST['sum_in'])]
    ];

    $arr_data[] = $recordLine;
    $updated_data = json_encode($arr_data);

    if (!file_exists(__DIR__ . '/../data/users.json')) {
        file_put_contents(__DIR__ . '/../data/users.json', json_encode([]));
    }
    file_put_contents(__DIR__ . '/../data/users.json', $updated_data);

    header('Location: http://localhost/bank_first/?u=1');
    die;
}
