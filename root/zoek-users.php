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

    <!-- Dynamisch zoeken zonder page refresh met gebruik van vue.js -->
    <div id="app">
        <p class="is-size-3">Zoek gebruikers</p>
        <input type="text" @keyup="zoekUser" v-model="zoekVeld" placeholder="zoek..." class="input">
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

<!-- Benodigde javascript VueJs -->
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
                axios.post('api/zoek_users.php', {
                    zoek: vm.zoekVeld,
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
<?php include "../src/footer.php"; ?>

