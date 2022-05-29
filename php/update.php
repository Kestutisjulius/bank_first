<?php
if (isset($_GET['update'])){
    $current_data = file_get_contents(__DIR__ . '/../data/users.json');
    $arr_data = json_decode($current_data, true);
    $index = $_GET['update'];
    $currentUser = $arr_data[$index];

?>
<div class="workingSpace">
    <div class="inf">
        <h1 class="h1">EDIT user form :</h1>
        <form action="./php/write.php" method="post" class="form"> <!-- action - i kur siusti -->
            <label for="<?php echo $currentUser['Avatar name']; ?>">Avatar Name: </label>
            <input type="text" id="aname" name="<?php echo $currentUser['Avatar name']; ?>">
            <label for="<?php echo $currentUser['Name']; ?>">Name: </label>
            <input type="text" id="name" name="<?php echo $currentUser['Name']; ?>">
            <label for="<?php echo $currentUser['Surname']; ?>">Surname: </label>
            <input type="text" id="sname" name="<?php echo $currentUser['Surname']; ?>">

            <input type="radio" id="male" name="<?php echo ($currentUser['Gender'] == 'male') ? print_r('checked="checked"') : print_r('')  ?>" value="male">
            <label for="male">male</label>

            <input type="radio" id="female" name="<?php echo ($currentUser['Gender'] == 'female') ? print_r('checked="checked"') : print_r('')  ?>" value="female">
            <label for="female" >female</label><div class="br"></div>

            <label>Contribution €: <?php echo $currentUser['Sum input']; ?></label>

            <textarea id="user_info" name="user_info" rows="4" cols="58"><?php echo $currentUser['Additional info']; ?></textarea>
            <div class="submit"><input id="submit" type="submit" value="Submit" class="submit_a" name="create"></div>
        </form>
    </div>
</div>
<?php
}