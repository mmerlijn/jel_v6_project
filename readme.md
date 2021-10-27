## Project maak een webapplicatie V6

Dit is een eenvoudige opzet hoe je een project zou op kunnen zetten. Bijgevoed is een eenvoudige database *v6* met één
tabel *users*
Zie hiervoor database.sql zorg ervoor dat je dit bestand niet in je project folder laat staan.

Let op dat wachtwoorden versleuteld worden opgeslagen in de database.

### Installeren
- Importeer de database met de tabel users door het uitvoeren van database.sql
- Pas de configuratie parameters aan in config.php 
- Voor het script create_users.php uit [create_users.php](http://localhost/create_users.php) (of pas eerst aan naar wens)
   Met het script create_users.php worden de volgende gebruikers aangemaakt
  - admin@psg.nl met ww: admin
  - user@psg.nl met ww: user
  - test@mail.nl met ww: test

### Opzet

- Startpagina *index.php*
- Controle op toegangsrechten *auth.php*
- Functies die je graag in je pagina gebruikt komen in *functions.php*
- Afhandelen van de login *login.php*
- variabele die je over wilt gebruiken in *config.php*
- Menu in *menu.php*
- Stylesheets en anders header parameters in *header.php*
- Alles in de footer in *footer.php*

### Pagina's

- Startpagina *index.php*
- Voorbeeld beveiligde pagina waar je alleen met inloggen op kan *pagina1.php*
- Voorbeeld beveiligde pagina waar je alleen met bepaalde rol op kan *admin.php*
- Inlogpagina *login.php*

### Layout onbeveiligde pagina

```
<?php include "start.php";?>
<?php include "header.php";?>

<!-- hier komt je content -->

<?php include "footer.php";?>
```

### Layout beveiligde pagina

```
<?php include "start.php";?>
<?php include "auth.php";?>
<?php include "header.php";?>

<!-- Hier komt de content van je pagina -->

<?php include "footer.php"; ?>
```

### Layout beveiligde pagina met een bepaalde rol

```
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

<?php include "footer.php"; ?>
```