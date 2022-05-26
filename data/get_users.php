<?php

if(!file_exists(__DIR__ .'/users.json')){
    file_put_contents(__DIR__ .'/users.json', json_encode([]));
}
define('USERS', json_decode(file_get_contents(__DIR__ .'/users.json')));
