</main>
<footer class="footer p-0">
    <div class="is-pink is-fixed-bottom navbar">
        <div class="column is-half is-offset-one-quarter">
            <div class="has-text-centered is-italic">
                Deze website is gemaakt door <?php echo $page['by']; ?> 2021
            </div>
        </div>
    </div>
</footer>

<?php
//Debug informatie weergeven (is in config.php uit te zetten)
if ($debug) {
    echo "<div class=\"m-4 p-4 has-background-black has-text-white\">";
    echo "<section class=\"hero\">";
    echo "<p class=\"title has-text-white\">Debug info</p>";
    echo "<p class=\"subtitle has-text-white\">\$debug = true (uitzetten kan in config.php)</p>";
    echo "</section>";
    echo "<br>";
    echo "<pre class=\"is-family-monospace\">";
    echo "\$_GET contains: \n";
    var_dump($_GET);
    echo "-----------------------------------------------------------\n";
    echo "\$_POST contains: \n";
    var_dump($_POST);
    echo "-----------------------------------------------------------\n";
    echo "\$_SESSION contains: \n";
    var_dump($_SESSION);
    echo "-----------------------------------------------------------\n";
    echo "\$_COOKIES contains: \n";
    var_dump($_COOKIE);
    //echo "-----------------------------------------------------------\n";
    //echo "\$_SERVER contains: \n";
    //var_dump($_SERVER);
    echo "Debug info kan worden uitgezet in config.php\n";
    echo "</pre>";
    echo "</div>";
}
?>


</body>
</html>