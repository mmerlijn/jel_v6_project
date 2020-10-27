<?php include "start.php"; ?>
<?php
//er is een login poging verstuurd
if (isset($_POST['login'])) {
    //probeer de gebruiker in te loggen via gegevens in de database

    if (!empty($_POST['username']) and !empty($_POST['password'])) {
        //hier natuurlijk een goede en veilige login login
        if ($_POST['username'] == 'mli') {
            $_SESSION['user'] = ['name' => 'Menno', 'role' => 'admin'];
            $_SESSION['login'] = true;
            $succes = "Je bent binnen!";
            //doorverwijzen naar de pagina waar je vandaan kwam
            if (isset($_SESSION['to'])) {
                $to = $_SESSION['to'];
                unset($_SESSION['to']);
                header("location: " . $to);
            } else {
                header("location: index.php");
            }
        } elseif ($_POST['username'] == 'piet') {
            $_SESSION['user'] = ['name' => 'Piet', 'role' => 'klant'];
            $_SESSION['login'] = true;
            $succes = "Je bent binnen!";
            //doorverwijzen naar de pagina waar je vandaan kwam
            if (isset($_SESSION['to'])) {
                $to = $_SESSION['to'];
                unset($_SESSION['to']);
                header("location: " . $to);
            } else {
                header("location: index.php");
            }
        } else {
            //Als inloggen faalt dan ...
            $error = "Geen gebruiker gevonden met deze gegevens";
        }
    } else {
        // geen gegevens meegstuurd
        $error = "gebruikersnaam en wachtwoord zijn verplicht";
    }
}

?>
<?php include "header.php"; ?>


<div class="flex justify-center">
<div class="border shadow-lg p-5 rounded-lg bg-gray-100">
<form method="post" action="login.php">
<input type="text" name="username" placeholder="Gebruikersnaam" class="block m-2 p-2 rounded">
<input type="password" name="password" placeholder="Wachtwoord" class="block m-2 p-2 rounded">

<input type="submit" name="login" value="Ik wil naar binnen"
       class="block rounded bg-blue-600 shadow-lg p-2 text-white hover:bg-blue-500 mt-4">
</form>
    <?php
    if (isset($error)) {
        echo "<span class=\"text-red-600\">$error</span>";
    }
    ?>
</div>
</div>

<?php include "footer.php"; ?>