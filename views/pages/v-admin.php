<!DOCTYPE html>
<html lang="en">
<?php
include_once './views/elements/v-head.php';
global $Template;
?>

<body>
    <?php include_once './views/elements/v-navbar.php'; ?>
    <?php
    if ($alert = $Template->get_alert()) {
        $type = $alert['type'];
        $message = $alert['message'];
    ?>
    <section class="alert alert--<?= $type ?>">
        <?= $message ?>
    </section>
    <?php
        unset($_SESSION['alert']);
    } ?>
    <main class="actions__wrapper">
        <article class="action">
            <a href="admin-edit.php">
                <i class="far fa-edit"></i>
                <h3>Edit articles</h3>
                <div class="action_desc">
                    edit or delete your articles
                </div>
            </a>
        </article>
        <article class="action">
            <a href="admin-create.php">
                <i class="far fa-plus-square"></i>
                <h3>create articles</h3>
                <div class="action__desc">
                    create new articles
                </div>
            </a>
        </article>
    </main>
</body>

</html>