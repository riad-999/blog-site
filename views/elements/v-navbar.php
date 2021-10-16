<header class="main-header">
    <a class="logo" href="/blog/">
        <h5>
            stay in shape
        </h5>
    </a>
    <nav class="navbar">
        <ul class="navbar__list">
            <li class="navbar__item">
                <a href="./">home</a>
            </li>
            <li class="navbar__item">
                contacts
            </li>
            <?php
            if (
                isset($_SESSION['is-auth']) &&
                isset($_SESSION['admin']) &&
                $_SESSION['admin'] === '1'
            ) {
            ?>
            <li class="navbar__item">
                <a href="./admin">
                    admin
                </a>
            </li>
            <?php } ?>
        </ul>
        <button class="btn">
            <?php if ($Template->get_data('is-auth')) { ?>
            <a href="./signout.php">sign out</a>
            <?php } else { ?>
            <a href="./signin.php">sign in/up</a>
            <?php } ?>
        </button>
    </nav>
    <button class="btn btn--no-bg toggle-sidebar">
        <i class="fas fa-bars"></i>
    </button>
    <aside class="sidebar hide">
        <ul class="sidebar__list">
            <li class="sidebar__item">
                home
            </li>
            <li class="sidebar__item">
                contacts
            </li>
        </ul>
        <button class="btn">
            signin
        </button>
    </aside>
</header>