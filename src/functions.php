<?php
//voor de handigheid kan je ook functies aanmaken
function isLogin(): bool
{
    if ($_SESSION['user']['id'] ?? false) {
        return true;
    }
    return false;
}

function hasRole($role):bool
{
    if ($_SESSION['user']['id'] ?? false) {
        return $_SESSION['user']['role'] == $role;
    }
    return false;
}

function username():string
{
    if ($_SESSION['user']['id'] ?? false) {
        return $_SESSION['user']['voornaam'] . " " . $_SESSION['user']['tussenvoegsel'] . " " . $_SESSION['user']['achternaam'];
    }
    return '';
}

/*
 * Deze functie maakt een token aan. Om een formulier te beveiligen kan je dit gebruiken.
 * Zie als voorbeeld het inlog formulier login.php
 *
 * */

function makeToken($field = true): void
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
function getToken():void
{
    makeToken();
}
function setToken():void
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

//wordt gebruikt indien de applicatie niet in de root directory staat
function getPath(): string
{
    return str_replace("//", "/", pathinfo($_SERVER['REQUEST_URI'])['dirname'] . "/");
}

//wordt gebruikt voor Content Security Policy
function getNonce(): string
{
    if (!isset($_SESSION['nonce'])) {
        $bytes = random_bytes(20);
        $_SESSION['nonce'] = bin2hex($bytes);
    }
    return $_SESSION['nonce'];

}