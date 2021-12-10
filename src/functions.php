<?php
//voor de handigheid kan je ook functies aanmaken
function isLogin(): bool
{
    if ($_SESSION['user']['id'] ?? false) {
        return true;
    }
    return false;
}

function hasRole($role): bool
{
    if ($_SESSION['user']['id'] ?? false) {
        return $_SESSION['user']['role'] == $role;
    }
    return false;
}

function username(): string
{
    if ($_SESSION['user']['id'] ?? false) {
        return $_SESSION['user']['voornaam'] . " " . $_SESSION['user']['tussenvoegsel'] . " " . $_SESSION['user']['achternaam'];
    }
    return '';
}

function flash(string $msg, bool $succes = true): void
{
    $_SESSION['flash']['msg'] = $msg;
    if ($succes) {
        $_SESSION['flash']['success'] = $msg;
    } else {
        $_SESSION['flash']['error'] = $msg;
    }
}

/*
 * Deze functie maakt een token aan. Om een formulier te beveiligen kan je dit gebruiken.
 * Zie als voorbeeld het inlog formulier login.php
 *
 * */

function makeToken($field = true): void
{
    $bytes = random_bytes(32);
    $token = bin2hex($bytes);
    $_SESSION['tokens'][] = $token;
    if ($field) {
        echo "<input type=\"hidden\" name=\"_token\" value=\"$token\">";
    } else {
        echo $token;
    }
}

function makeApiToken(): void
{
    $_SESSION['api_token'] = bin2hex(random_bytes(64));
    echo $_SESSION['api_token'];
}

/*
 * Na het versturen van een formulier kan je validateToken() gebruiken om te controleren of de token bestaat
 * zie als voorbeeld login.php
 * */
function validateToken(): bool
{
    if (in_array($_POST['_token'] ?? '', $_SESSION['tokens'] ?? [])) {
        $_SESSION['tokens'] = []; //alle tokens wissen, zodat ze niet hergebruikt kunnen worden
        return true;
    }
    if (($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '') == $_SESSION['api_token']) {
        return true;
    }
    return false;
}


//wordt gebruikt indien de applicatie niet in de root directory staat
function getPath(): string
{
    return str_replace(["//", "\\/"], "/", pathinfo($_SERVER['PHP_SELF'])['dirname'] . "/");
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