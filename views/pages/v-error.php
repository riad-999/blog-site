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
        <section class="error">
            <h3 class="center">
                Error: <?= isset($_SESSION['error-message']) ? $_SESSION['error-message'] : null ?>
            </h3>
        </section>
    </main>
</body>

</html>