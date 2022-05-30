<?php
if (isset($_GET['update'])){
    $current_data = file_get_contents(__DIR__ . '/../data/users.json');
    $arr_data = json_decode($current_data, true);
    $index = $_GET['update'];
    $currentUser = [];
    foreach ($arr_data as $key => $value){
        if ($key == $index){
            $currentUser = $value;
        }
    }

?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../CSS/forEdit.css">
        <title>K-Bank Edit</title>
    </head>
        <div class="background font">
            <h1 class="h1-update">Update: <?php echo $currentUser['Name']?> with ID [<?php echo $currentUser['id']?>]</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form"> <!-- action - i kur siusti -->
                <div class="gender"><?php echo $currentUser['Gender']?></div>
                <label class="label" for="aname">Avatar Name: </label>
                <input type="text" id="aname" name="avatar_name" value="<?php echo $currentUser['Avatar name']?>">
                <label class="label" for="name">Name: </label>
                <input type="text" id="name" name="name" value="<?php echo $currentUser['Name']?>">
                <label class="label" for="sname">Surname: </label>
                <input type="text" id="sname" name="sname" value="<?php echo $currentUser['Surname']?>">
                <textarea class="txtArea" id="user_info" name="user_info" rows="4" cols="58"><?php echo $currentUser['Additional info']?></textarea>
                <div class="br"></div>
                <div class="haveFund">Has: <?php echo $currentUser['Sum input']?>&#8364.</div>
                <div class="flex">
                    <div class="together">
                        <label for="sum_in" class="sumLabel">add funds:</label>
                        <input type="number" id="sum_in" name="sum_in" placeholder="+ ...Euro" class="sumInput">
                    </div>
                    <div class="together">
                        <label for="sum_out" class="sumLabel">lost funds:</label>
                        <input type="number" id="sum_out" name="sum_out" placeholder="minus ...Euro" class="sumInput">
                    </div>
                </div>
                    <div class="submit"><input id="submit" type="submit" value="Submit" class="submit_a" name="edit"></div>
            </form>
        </div>
<?php
}

