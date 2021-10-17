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
    <main>
        <section class="article">
            <h2>
                <?= $Template->get_data('blog-title') ?>
            </h2>
            <?= $Template->get_data('html') ?>
        </section>
    </main>
</body>

</html>