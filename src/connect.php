<?php
if (!isset($link)) {
    if($debug) {
        $link = mysqli_connect($database['host'], $database['user'], $database['pwd'], $database['name'], $database['port'])
        or die(mysqli_connect_error());
    }else{
        $link = mysqli_connect($database['host'], $database['user'], $database['pwd'], $database['name'], $database['port']);
    }
    mysqli_set_charset($link, $page['charset']);
}
