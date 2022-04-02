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
            <div class="mb-5">
                <button class="btn">
                    <a href="<?= SITE_PATH . '/' . $Template->get_data('back') . '?go-back' ?>">
                        Go Back
                    </a>
                </button>
            </div>
            <h2>
                <?= $Template->get_data('article-title') ?>
            </h2>
            <?= $Template->get_data('html') ?>
        </section>
    </main>
</body>

</html>