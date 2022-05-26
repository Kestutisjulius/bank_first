<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./CSS/main.css">
    <title>Document</title>
</head>
<body>
        <header class="bankUserInfo"></header>
        <main>
            <div class="workPage">
                <a target="window" class="btn" href="<?php echo 'S'?>">All</a>
                <button class="btn" type="button">Add</button>
            </div>
            <div class="infoPage">
                <iframe name="window"></iframe>
            </div>
        </main>
        <footer class="bankInfo"></footer>
</body>
</html>


