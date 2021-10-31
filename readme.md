## Project maak een webapplicatie V6

Dit is een eenvoudige opzet hoe je een project zou op kunnen zetten. 

### Installeren
- Download de de code. Na het downloaden kan deze worden geplaatst in de UsbWebserver directory de map *root* zal worden overschreven en de map *src* zal worden toegevoegd.
- Importeer de database met de tabel users, deze staat in src/database.sql
  - Dit maakt een database `v6` aan met een tabel `users`
- Pas de configuratie parameters aan in src/config.php
  - Om het te laten werken moet minimaal het wachtwoord van de database user worden aangepast
  - Daarnaast is het handig om de charset goed te zetten
- Voor het script create_users.php uit [create_users.php](http://localhost/create_users.php) (of pas eerst aan naar wens)
   Met het script create_users.php worden de volgende gebruikers aangemaakt
  - admin@psg.nl met ww: admin
  - user@psg.nl met ww: user
  - test@mail.nl met ww: test
  
  **Nadat de users aangemaakt zijn moet het bestand create_users.php verwijderd worden !!!** 

### Opzet

- Startpagina *index.php*
- Controle op toegangsrechten *auth.php*
- Functies die je graag in je pagina gebruikt komen in *functions.php*
- Afhandelen van de login *login.php*
- variabele die je over wilt gebruiken in *config.php*
- Menu in *menu.php*
- Stylesheets en anders header parameters in *header.php*
- Alles in de footer in *footer.php*
- Aanroep van de benodigde scripts in *start.php*

### Pagina's

- Startpagina *index.php*
- Voorbeeld beveiligde pagina waar je alleen met inloggen op kan *pagina1.php*
- Voorbeeld beveiligde pagina waar je alleen met bepaalde rol op kan *admin.php*
- Inlogpagina *login.php*

### Layout onbeveiligde pagina

Onderstaande code kan je gebruiken als template voor een onbeveiligde pagina
```html
<?php include "../src/start.php";?>
<?php include "../src/header.php";?>

<!-- hier komt je content -->

<?php include "../src/footer.php";?>
```

### Layout beveiligde pagina

Onderstaande code kan je gebruiken als template voor een beveiligde pagina
```html
<?php include "../src/start.php";?>
<?php include "../src/auth.php";?>
<?php include "../src/header.php";?>

<!-- Hier komt de content van je pagina -->

<?php include "../src/footer.php"; ?>
```

### Layout beveiligde pagina met een bepaalde rol

Onderstaande code kan je gebruiken als template voor een beveiligde waarbij de gebruiker een bepaalde rol moet hebben

```html
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

### Menu

Het menu staat in *menu.php* en maakt gebruik van een standaard menu van [bulma](https://bulma.io/documentation/components/navbar/)
Deze is volledig naar wens aan te passen.

### Footer en debug

In *footer.php* is de footer tekst aan te passen. Of naar wens te configureren. Indien je geen footer wilt kan je dit bestand ook leegmaken.
LET OP dat in footer ook de *debug* staat. Dit is handig tijdens het ontwikkelen. Je kan debug in *src/config.php* uitzetten.

### Content Security Policy
De applicatie maakt gebruik van een [CSP header](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP) deze maakt onze website veiliger voor eindgebruikers.

Indien je een zelf een stukje javascript wilt toevoegen aan je project kan je dat als volgt doen.
```html
<script nonce="<?php echo getNonce(); ?>">
// je script code
</script>
```

Inline styles/scripts worden default geblokkeerd. Kijk regelmatig even bij `developer tools -> console` hier kan je zien dat bepaalde code wordt geblokkeerd. Wanneer je dit toch wilt toestaan kan dit door het aanpassen van de CSP header in *start.php*

### CSRF-protection
Deze applicatie heeft een zeer eenvoudige [CSRF-protectie](https://cheatsheetseries.owasp.org/cheatsheets/Cross-Site_Request_Forgery_Prevention_Cheat_Sheet.html)
Bij elke aanvraag bij de server (post request) zal gekeken worden of er een geldige *token* wordt meegestuurd.
Deze token kan eenvoudig aan je formulier worden toegevoegd d.m.v. `<?php makeToken(); ?>`. Hieronder een voorbeeld:
```html
<form method="post">
  <?php makeToken(); ?>
</form>
```

### Extra's
In de *src/header.php* worden [vue.js](https://vuejs.org/v2/guide) en axios libraries ingeladen.
In de pagina *admin.php* is een voorbeeld te vinden hoe je dit kan gebruiken om bijvoorbeeld naar users te zoeken.
Het werkelijke zoeken gebeurt in *zoek_users.php*
Vue.js samen met axios maken het mogelijk om zonder een page-refresh te zoeken naar data.
Door middel van *F12* -> *netwerk* kan je zien wat er wordt verstuurd tijdens het zoeken.

### Bugs en security issues
Indien je problemen tegenkomt laat het weten. Alleen door samenwerken kunnen we de wereld verbeteren!