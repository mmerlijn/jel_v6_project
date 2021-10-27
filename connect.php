<?php
if (!isset($link)) {
    $link = mysqli_connect($database['host'], $database['user'], $database['pwd'], $database['name'], $database['port'])
    or die(mysqli_connect_error());
    mysqli_set_charset($link, "utf8");
}
