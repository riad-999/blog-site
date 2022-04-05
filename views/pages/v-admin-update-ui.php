<!DOCTYPE html>
<html lang="en">
<?php include_once './views/elements/v-head.php'; ?>

<body>
    <?php include_once './views/elements/v-navbar.php'; ?>
    <?php
    // global $Template;
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
        <h2 class="center">update an article</h2>
        <form method="POST" class="form form--article" enctype="multipart/form-data">
            <div class="form__row">
                <label for="title" class="form__label">
                    blog title
                </label>
                <input type="text" class="form__input" name="title" id="title" placeholder="ar"
                    value="<?= $Template->get_data('form-title') ?>">
            </div>
            <div class="form__row">
                <label for="title" class="form__label">
                    blog image
                </label>
                <div class='upload'>
                    <input type="file" accept="images/*" class="form__input" name="image" id="upload-image">
                    <img id="image" src="<?= './views/images/uploads/' . $Template->get_data('form-image') ?>"
                        alt="select an image">
                </div>
            </div>
            <div class="form__row">
                <label for="article">
                    article
                </label>
                <textarea class="form__textarea" name="markdown"
                    placeholder="article content"><?= $Template->get_data('form-markdown') ?></textarea>
            </div>
            <button class="btn" type="submit" name="update">update</button>
        </form>
    </main>
    <?php include_once './views/elements/v-footer.php'; ?>
</body>

</html>