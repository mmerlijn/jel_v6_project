<?php
/*
 * Dit script maakt 3 gebruikers aan
 *
 * TODO verwijder dit script als je project af is !!!!!!!!!!!!!!!!!!!!!!
 *
 * */
//connectie met de gewenste database
include "../src/config.php";
include "../src/connect.php";

if (!$debug) {
    exit();
}
//Aanmaken admin gebruiker
$email = 'admin@psg.nl';
$password = 'admin';
$voornaam = 'Admin';
$achternaam = 'Administrator';
$role = 'admin';
//indien de gebruik al bestaat verwijderen we de gebruiker
mysqli_query($link, "DELETE FROM users WHERE `email`='$email'");
mysqli_query($link, "INSERT INTO users(`email`, `password`,`voornaam`,`achternaam`,`role`) VALUES ('$email','" . password_hash($password, PASSWORD_BCRYPT) . "','$voornaam','$achternaam','$role')")
or die ("Er ging iets fout bij de gebruiker aanmaken: " . mysqli_error($link));

if (mysqli_affected_rows($link)) {
    echo "Gebruiker $email met wachtwoord $password is aangemaakt<br>";
}

//Aanmaken user
$email = 'user@psg.nl';
$password = 'user';
$voornaam = 'U';
$achternaam = 'User';
$role = 'user';
//indien de gebruik al bestaat verwijderen we de gebruiker
mysqli_query($link, "DELETE FROM users WHERE `email`='$email'");
mysqli_query($link, "INSERT INTO users(`email`, `password`,`voornaam`,`achternaam`,`role`) VALUES ('$email','" . password_hash($password, PASSWORD_BCRYPT) . "','$voornaam','$achternaam','$role')")
or die ("Er ging iets fout bij de gebruiker aanmaken: " . mysqli_error($link));

if (mysqli_affected_rows($link)) {
    echo "Gebruiker $email met wachtwoord $password is aangemaakt<br>";
}

//Aanmaken test gebruiker
$email = 'test@mail.nl';
$password = 'test';
$voornaam = 'Tinus';
$achternaam = 'Test';
$role = 'user';
//indien de gebruik al bestaat verwijderen we de gebruiker
mysqli_query($link, "DELETE FROM users WHERE `email`='$email'");
mysqli_query($link, "INSERT INTO users(`email`, `password`,`voornaam`,`achternaam`,`role`) VALUES ('$email','" . password_hash($password, PASSWORD_BCRYPT) . "','$voornaam','$achternaam','$role')")
or die ("Er ging iets fout bij de gebruiker aanmaken: " . mysqli_error($link));

if (mysqli_affected_rows($link)) {
    echo "Gebruiker $email met wachtwoord $password is aangemaakt<br>";
}
?>
<div style="margin-top:10px;font-weight:bold">
    Verwijder het bestand create_users.php !!!!
</div>
