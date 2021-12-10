<nav class="navbar is-pink" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="<?php echo getPath();?>logo.png" height="28"> <span class="ml-4 is-size-4 has-text-purple has-text-weight-bold">Jan van Egmond Lyceum</span>
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 pr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            <?php
            if (hasRole('admin')) {
                ?>
                <a href="admin.php" class="navbar-item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 pr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                    Admin</a>
                <?php
            }
            ?>
            <?php
            if (hasRole('admin')) {
                ?>
                <a href="zoek-users.php" class="navbar-item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 pr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Gebruikers</a>
                <?php
            }
            ?>
            <a class="navbar-item" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 pr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact
            </a>
            <a class="navbar-item" href="flash_example.php">
                Flash
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
                        <a class="button is-purple">
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