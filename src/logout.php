<?php
//Uitloggen indien
if (isset($_POST['logout']) or isset($_GET['logout'])) {
    unset($_SESSION['user']);
    unset($_SESSION['tokens']);
//doorverwijzen naar de startpagina
    header("location: ".getPath()."index.php");
}