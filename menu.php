<div class="flex">
    <a href="index.php" class="font-bold p-2 m-2 hover:bg-gray-100">Home</a>
    <a href="pagina1.php" class="font-bold p-2 m-2 hover:bg-gray-100">Pagina 1</a>
        <?php
        if(hasRole('admin')){
        echo "<a href=\"admin.php\" class=\"font-bold p-2 m-2 hover:bg-gray-100\">Admin</a>";
        }
        ?>
        <?php
        if(isLogin()){
            echo "<a href=\"login.php?logout=1\" class=\"font-bold p-2 m-2 hover:bg-gray-100\">Uitloggen</a>";
        }else{
            echo "<a href=\"login.php\" class=\"font-bold p-2 m-2 hover:bg-gray-100\">Inloggen</a>";
        }

        ?>
</div>