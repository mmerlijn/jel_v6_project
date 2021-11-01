<?php include "../src/start.php"; ?>
<?php include "../src/auth.php"; ?>
<?php
//Je mag deze pagina alleen bezoeken als je de rol admin hebt
if (!hasRole('admin')) {
    header('location: '.getPath().'index.php');
}
?>
<?php include "../src/header.php"; ?>

<!-- Hier komt de content van je pagina -->
<div class="card card column is-offset-3 is-6 mt-3">
    <h1 class="is-size-3">Ik ben op de geheime admin pagina</h1>
</div>


<?php include "../src/footer.php"; ?>

