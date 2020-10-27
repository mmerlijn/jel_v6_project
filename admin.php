<?php include "start.php";?>
<?php include "auth.php";?>
<?php
//Je mag deze pagina alleen bezoeken als je de rol admin hebt
if(!hasRole('admin')){
    header('location: index.php');
}
?>
<?php include "header.php";?>

<!-- Hier komt de content van je pagina -->
<h1 class="text-5xl mx-4">Ik ben op de geheime admin pagina</h1>


<?php include "footer.php"; ?>