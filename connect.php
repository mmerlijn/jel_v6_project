<?php
if(!isset($link)){
    $link = mysqli_connect("localhost","root","secret","jel",3306) or die(mysqli_connect_error());
}
