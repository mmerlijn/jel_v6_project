<?php
//Uitloggen indien
if (isset($_POST['logout']) or isset($_GET['logout'])) {
    unset($_SESSION['user']);
//doorverwijzen naar de startpagina
    header("location: index.php");
}