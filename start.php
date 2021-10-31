<?php
session_start();
include "config.php";
include "functions.php";
include "connect.php";
include "logout.php";
//content-security-policy
header("Content-Security-Policy: base-uri 'self';connect-src 'self';default-src 'self';form-action 'self';img-src 'self' ;media-src 'self';object-src 'none';script-src cdn.jsdelivr.net 'nonce-" . getNonce() . "' 'unsafe-eval'; style-src cdn.jsdelivr.net 'self' 'nonce-" . getNonce() . "'");


