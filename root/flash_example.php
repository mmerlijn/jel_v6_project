<?php include "../src/start.php"; ?>

<?php
// LET OP als je flash messages wilt gebruiken dat je deze aanmaakt voor include header.php
if (isset($_POST['opslaan_e'])) {
    //.. hier kan je gaan opslaan

    //daarna feedback naar de gebruiker, dat het mislukt is
    flash("Helaas het opslaan is mislukt, probeer opnieuw", false);
}
if (isset($_POST['opslaan_s'])) {
    //.. hier kan je gaan opslaan

    //daarna feedback naar de gebruiker, dat het gelukt is
    flash("Het opslaan is gelukt");

    //als het wenselijk is kan je een gebruiker ook naar een andere pagina sturen.
    header("location: index.php");
    exit();
}

?>

<?php include "../src/header.php"; ?>

<section class="section">
    <article class="panel is-primary">
        <p class="panel-heading">
            Voorbeeld van flash message
        </p>
        <div class="panel-block">

            <div class="control">
                <form method="post">
                    <?php makeToken(); ?>
                    <button type="submit" name="opslaan_s" class="button is-success">Opslaan (succesvol)</button>
                </form>
            </div>
        </div>
        <div class="panel-block">

            <div class="control">
                <form method="post">
                    <?php makeToken(); ?>
                    <button type="submit" name="opslaan_e" class="button is-danger">Opslaan (met error)</button>
                </form>
            </div>
        </div>
    </article>
    <article class="panel is-primary">
        <p class="panel-heading">
            Hoe te gebruiken
        </p>
        <div class="panel-block">
            <p>
                Je kan een flash bericht aanmaken voordat header.php wordt ingeladen door in PHP<br>
                <code>flash("melding die je wilt sturen");</code> te gebruiken.<br>
            </p>
        </div>
        <div class="panel-block">
            <p>
                Flash bericht met succes <code>flash("Succes");</code>
            </p>
        </div>
        <div class="panel-block">
            <p>
                Flash bericht met error <code>flash("Error",false);</code>
            </p>
        </div>
    </article>
</section>
<?php include "../src/footer.php"; ?>
