<?php
if (isset($_GET['order'])) {
    $current_data = file_get_contents(__DIR__ . '/../data/users.json');
    $arr_data = json_decode($current_data, true);
    $index = $_GET['order'];
    $currentUser = [];
    $new_arr = [];
    foreach ($arr_data as $key => $value){
        if ($key == $index){
            $currentUser = $value;
        } else{
            $new_arr[] = $value;
        }
    }
    function kodai($arr){
        foreach ($arr as $value){
            print_r('id: '.$value['id'].' Vardas: '.$value['Name'].'<br>');
        }
    }
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/forEdit.css">
    <title>K-Bank Transfer</title>
</head>
<div class="background font">
    <h1 class="h1-update"><?php echo $currentUser['Name']?> id: <?php echo $currentUser['id']?></h1>
    <form name="orderForm" method="post" action="./edit.php">
        <div class="form">
        <label for="name">gavejo kodas: </label>
        <input type="text" id="name" name="name" placeholder="gavejo kodas..">
        </div>
        <div class="form">
        <label for="sum">suma: </label>
        <input type="number" id="sum" name="sum" placeholder="suma..">
        <button class="submit_o_o" name="orderDo" type="submit" value="<?php echo $currentUser['id']?>">GO -><input class="submit_o" placeholder="order"/></button>
        </div>
    </form>
    <div class="kodai"><?php kodai($arr_data);  ?></div>
</div>