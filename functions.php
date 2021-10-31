<?php
//voor de handigheid kan je ook functies aanmaken
function isLogin()
{
    if ($_SESSION['user']['id'] ?? false) {
        return true;
    }
    return false;
}

function hasRole($role)
{
    if ($_SESSION['user']['id'] ?? false) {
        return $_SESSION['user']['role'] == $role;
    }
    return false;
}

function username()
{
    if ($_SESSION['user']['id'] ?? false) {
        return $_SESSION['user']['voornaam'] . " " . $_SESSION['user']['tussenvoegsel'] . " " . $_SESSION['user']['achternaam'];
    }
    return '';
}

function debug()
{
    if (!$GLOBALS['debug']) {
        return;
    }
    echo "<br><br>";
    echo "<pre class=\"m-4 p-4 has-background-black has-text-white is-family-monospace\">";
    echo "POST contains: \n";
    var_dump($_POST);
    echo "-----------------------------------------------------------\n";
    echo "SESSION contains: \n";
    var_dump($_SESSION);
    echo "Debug info kan worden uitgezet in config.php\n";
    echo "</pre>";
}

/*
 * Deze functie maakt een token aan. Om een formulier te beveiligen kan je dit gebruiken.
 * Zie als voorbeeld het inlog formulier login.php
 *
 * */

function makeToken($field = true)
{
    $bytes = random_bytes(20);
    $token = bin2hex($bytes);
    $_SESSION['tokens'][] = $token;
    if ($field) {
        echo "<input type=\"hidden\" name=\"_token\" value=\"$token\">";
    } else {
        echo $token;
    }
}

//aliases
function getToken()
{
    makeToken();
}

function setToken()
{
    makeToken();
}

/*
 * Na het versturen van een formulier kan je validateToken() gebruiken om te controleren of de token bestaat
 * zie als voorbeeld login.php
 * */
function validateToken($empty = true): bool
{
    if (in_array($_POST['_token'] ?? '', $_SESSION['tokens'] ?? [])) {
        if ($empty) {
            $_SESSION['tokens'] = [];
        }
        return true;
    }
    return false;
}

function getPath(): string
{
    return str_replace("//", "/", pathinfo($_SERVER['REQUEST_URI'])['dirname'] . "/");
}

function getNonce()
{
    if (!$_SESSION['nonce']) {
        $bytes = random_bytes(20);
        $_SESSION['nonce'] = bin2hex($bytes);
    }
    return $_SESSION['nonce'];

}