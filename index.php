<?php
session_start();
require __DIR__.'/data/get_users.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./CSS/main.css">
    <title>K-Bank program</title>
</head>
<body>

        <main>
            <div class="workPage">
                <a class="btn" type="button" href="http://localhost/bank_first/?u=1">All</a>
                <a class="btn" type="button" href="http://localhost/bank_first/?a=1">Add</a>
                <a id="btn" class="btn" type="button" href="http://localhost/bank_first/?i=1">Bank INFO</a>
            </div>
            <div class="background">
                <div class="logo"></div>
                <div class="workingSpace">
                    <?php
                    /** i -----------------------------------------------------------------------------*/
                    if(isset($_GET['i']) == 1){
                    ?>
                    <div class="inf">
                     <h1 class="h1">K-Town bank info :</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dignissimos atque porro ratione deleniti. Quisquam, officiis illo a in iure exercitationem? Perspiciatis, vero aperiam assumenda doloribus saepe repudiandae debitis quos quisquam? Sit tenetur sequi voluptate, sed eaque assumenda iusto ab repellat ipsam? Aut, veniam ratione fugiat officiis sed non sit. Expedita ad pariatur quasi ratione?</p>
                    </div>
                    <?php }
                    /** u -----------------------------------------------------------------------------*/
                    if(isset($_GET['u']) == 1){
                        $allUsers = USERS;
                        $transaction=[];
                        if (empty($allUsers)){
                            echo '<pre>';
                            print_r($_SERVER);
                        } else {
                            foreach ($allUsers as $objKey => $USER){
                                foreach ($USER as $key => $value){
                                        if(is_array($value)) {
                                            foreach ($value as $dateTime => $transactionSum) {
                                                $transaction[] = $transactionSum;
                                            }
                                        }
                                    ?>
                                <h4><?php echo($key) ?>: </h4><h3></h3><div class="br"></div>
                              <?php  } ?><div class="form-group">
                              <form action="./php/delete.php" method="get" class="form-delete">
                                <button class="submit_b_b" name="Delete" type="submit" value="<?php print_r($objKey)?>">DELETE -><input class="submit_b" placeholder="trink"/></button>
                              </form>
                              <form action="./php/update.php" method="get" class="form-update">
                                <button class="submit_u_u" name="update" type="submit" value="<?php print_r($objKey)?> ">UPDATE -><input class="submit_c" placeholder="reNew"/></button>
                              </form>
                                </div>
                                <div class="red"></div>

                                <?php
                            }
                        }

                        ?>
                        <div class="table">
                        </div>
                    <?php }
                    /** a -----------------------------------------------------------------------------*/
                    if(isset($_GET['a']) == 1){
                    ?>
                    <div class="inf">
                     <h1 class="h1">ADD user form :</h1>
                        <form action="./php/write.php" method="post" class="form"> <!-- action - i kur siusti -->
                            <label for="aname">Avatar Name: </label>
                            <input type="text" id="aname" name="avatar_name" placeholder="Your avatar..">
                            <label for="name">Name: </label>
                            <input type="text" id="name" name="name" placeholder="Your name..">
                            <label for="sname">Surname: </label>
                            <input type="text" id="sname" name="sname" placeholder="Your surname..">
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">female</label><div class="br"></div>
                            <label for="sum_in">Contribution €: </label>
                            <input type="number" id="sum_in" name="sum_in" placeholder="Your Contribution..">
                            <textarea id="user_info" name="user_info" rows="4" cols="58" placeholder="Additional info..."></textarea>
                            <div class="submit"><input id="submit" type="submit" value="Submit" class="submit_a" name="create"></div>
                        </form>
                    </div>
                    <?php } ?>
                </div>
                <div class="copyright">&#169 2022 K_TOWN BANK</div>
            </div>

        </main>

</body>
</html>


