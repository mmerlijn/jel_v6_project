<?php
//voor de handigheid kan je ook functies aanmaken
function isLogin(){
    if(isset($_SESSION['login']) and $_SESSION['login']){
        return true;
    }
    return false;
}
function hasRole($role){
    if(isset($_SESSION['login']) and $_SESSION['login']){
        return $_SESSION['user']['role']==$role;
    }
    return false;
}

function debug(){
    echo "<pre>";
    echo "SESSION: \n";
    var_dump($_SESSION);
    echo "POST: \n";
    var_dump($_POST);
    echo "</pre>";
}
