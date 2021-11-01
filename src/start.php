<?php
session_start();
include "config.php";
include "functions.php";
include "connect.php";
include "logout.php";
//content-security-policy
header("Content-Security-Policy: base-uri 'self';connect-src 'self';default-src 'self';form-action 'self';img-src 'self' ;media-src 'self';object-src 'none';script-src cdn.jsdelivr.net 'nonce-" . getNonce() . "' 'unsafe-eval'; style-src cdn.jsdelivr.net 'self' 'nonce-" . getNonce() . "'");



//CSRF protection
if($_POST!=null){
    if(!validateToken()){
        echo "CSRF-token mismatch error. <a href=\"".($_SERVER['HTTP_REFERER']?:"/index.php")."\">Ga terug</a>";
        http_response_code(401); //Unauthorized
        exit();
    }
}
//API request (Vue.js)
if(isset($_SERVER['HTTP_X_CSRF_TOKEN'])){
    if(!validateToken()){
        echo "CSRF-token mismatch error";
        http_response_code(401); //Unauthorized
        exit();
    }
    $_POST = json_decode(file_get_contents('php://input'), true);
}

//Melding voor cookie gebruik
if(isset($_POST['accept_cookies'])){
    setcookie('accept_cookies',true,time()+31536000);
}