<?php
//Uitloggen indien
if (isset($_POST['logout']) or isset($_GET['logout'])) {
    $_SESSION['user'] = null;
    $_SESSION['login'] = false;
//doorverwijzen naar de startpagina
    header("location: index.php");
}