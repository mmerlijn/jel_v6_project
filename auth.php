<?php

//controlleer of een gebruiker is ingelogd en laat deze inloggen
if(!isLogin()) {

    //Welke pagina wilde de gebruiker bezoeken
    $_SESSION['to'] = $_SERVER['PHP_SELF'];

    //doorverwijzing naar de inlog pagina
    header("location: /login.php");
    exit();
}
