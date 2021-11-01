<?php include "../src/start.php"; ?>
<?php
//er is een login poging verstuurd
if (isset($_POST['login'])) {
    //huidige session leegmaken
    unset($_SESSION['user']);
    //probeer de gebruiker in te loggen via gegevens in de database
    if (!empty($_POST['email']) and !empty($_POST['password'])) {
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $result = mysqli_query($link
            , "SELECT * FROM users WHERE `email`='$email' and `deleted_at` IS NULL LIMIT 1"
        ); //or die mysqli_error($link));
        $user = mysqli_fetch_assoc($result);

        if ($user and count($user)) { //kijken of er data zit in $user, zo ja dan mag je naar binnen
            if (password_verify($password, $user['password'])) {
                //Alle user gegevens zetten we in de session zodat je erg makkelijk gegevens van de user kan tonen
                //zonder de database te hoeven gebruiken. bv: echo $_SESSION['user']['email'];
                unset($user['password']); //deze wil ik niet bewaren
                $_SESSION['user'] = $user;
                if (isset($_SESSION['to'])) { //Indien een doorverwijzing dan...
                    $to = $_SESSION['to'];
                    unset($_SESSION['to']);
                    header("location: " . $to);
                } else {
                    header("location: index.php");
                }
            }
        } else {
            //Als inloggen faalt dan ...
            $error = "Geen gebruiker gevonden met deze gegevens";
        }
    } else {
        // geen gegevens meegstuurd
        $error = "Email en wachtwoord zijn verplicht";
    }
}

?>
<?php include "../src/header.php"; ?>

    <div class="is-center mt-6">
        <div class="card column is-half is-offset-one-quarter">
            <p class="card-header-title">
                Inloggen
            </p>
            <div class="card-content">
                <form method="post" action="login.php">
                    <?php makeToken(); ?>
                    <div class="field">
                        <div class="control">
                            <input type="email" name="email" placeholder="Email" class="input"></div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="password" name="password" placeholder="Wachtwoord" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="submit" name="login" value="Ik wil naar binnen"
                                   class="button is-link">
                        </div>
                    </div>
                </form>
                <?php
                if (isset($error)) {
                    echo "<p class=\"help is-danger\">$error</p>";
                }
                ?>
            </div>
        </div>
    </div>


<?php include "../src/footer.php"; ?>