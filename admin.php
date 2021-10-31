<?php include "start.php"; ?>
<?php include "auth.php"; ?>
<?php
//Je mag deze pagina alleen bezoeken als je de rol admin hebt
if (!hasRole('admin')) {
    header('location: index.php');
}
?>
<?php include "header.php"; ?>

<!-- Hier komt de content van je pagina -->
<div class="card card column is-offset-3 is-6 mt-3">
    <h1 class="is-size-3">Ik ben op de geheime admin pagina</h1>

    <!-- Dynamisch zoeken zonder page refresh met gebruik van vue.js -->
    <div id="app">
        <p>Zoek gebruikers</p>
        <input type="text" @keyup="zoekUser" v-model="zoekVeld" placeholder="zoek...">
        <p class="is-bold mt-2">Resultaat:</p>
        <table class="table is-striped is-hoverable">
            <tr v-for="user in result">
                <td>{{user.email}}</td>
                <td>{{user.voornaam}} {{user.achternaam}}</td>
            </tr>
        </table>
        <p class="is-bold">Aantal gevonden resultaten: {{result.length}}</p>

    </div>
</div>
<script nonce="<?php echo getNonce(); ?>">
    var app = new Vue({
        el: '#app',
        data: {
            zoekVeld: '',
            result: [],
        },
        methods: {
            zoekUser: function () {
                var vm = this;
                //ajax request kijk met F12 bij netwerk wat er gebeurt
                axios.post('<?php echo getPath();?>zoek_users.php', {
                    zoek: vm.zoekVeld,
                    _token: '<?php makeToken(false);?>', //voor veiligheid
                })
                    .then(function (response) {
                        vm.result = response.data; //hetgeen terugkomt in result zetten
                    })
                    .catch(function (error) {
                        console.log(error); //fouten naar het console schrijven (moet weg in productie)
                    })
            }
        }
    })
</script>
<?php include "footer.php"; ?>

