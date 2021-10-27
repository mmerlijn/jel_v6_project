<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="logo.png" height="28"> <span class="ml-4">Jan van Egmond Lyceum</span>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="index.php">
                Home
            </a>
            <?php
            if (hasRole('admin')) {
                ?>
                <a href="admin.php" class="navbar-item">Admin</a>
                <?php
            }
            ?>
            <a class="navbar-item" href="#">
                Contact
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    More
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item" href="#">
                        About
                    </a>
                    <a class="navbar-item" href="#">
                        Jobs
                    </a>
                    <a class="navbar-item" href="#">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="#">
                        Report an issue
                    </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <?php echo username(); ?>
            </div>
            <div class="navbar-item">
                <div class="buttons">
                    <?php
                    if (isLogin()) {
                        ?>
                        <a class="button is-light" href="login.php?logout=1">
                            Uitloggen
                        </a>
                        <?php
                    } else {
                        ?>
                        <a class="button is-primary">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-light" href="login.php">

                            Inloggen
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>