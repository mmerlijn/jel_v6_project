<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page['title']; ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <!-- Onderstaande script alleen laten staan als je ook gebruik van VueJs gaan maken -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script nonce="<?php echo getNonce(); ?>">
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        axios.defaults.headers.common['X-CSRF-TOKEN'] = '<?php makeApiToken(false);?>';
        var exitFlash = setTimeout(function () {
            document.getElementById('flash_msg').remove();
        }, <?php echo $page['flash_duration'] ?? 2500;?>);
    </script>
    <!-- einde scripts voor VueJs -->

    <!-- In opmaak.css komt je custom css code -->
    <link rel="stylesheet" href="opmaak.css" nonce="<?php getNonce(); ?>">
</head>
<?php
//Cookies accepteren weergeven
if (!isset($_COOKIE['accept_cookies']) and !isset($_POST['accept_cookies'])) {
    ?>
    <div class="has-background-danger has-text-white is-size-4">
        <div class="column is-10 is-offset-1">
            <div class="columns">
                <div class="column is-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
                <div class="column is-9">Deze website maakt alleen gebruik van functionele cookies</div>
                <div class="column is-2">
                    <form method="post">
                        <?php makeToken(); ?>
                        <input type="submit" value="OK" name="accept_cookies" class="button is-light">
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php
} //einde accept_cookies

?>
<nav>
    <?php include "menu.php"; ?>
</nav>
<?php include "flash.php"; ?>
<main>

