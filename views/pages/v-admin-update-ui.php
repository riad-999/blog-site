<!DOCTYPE html>
<html lang="en">
<?php include_once './views/elements/v-head.php'; ?>

<body>
    <?php include_once './views/elements/v-navbar.php'; ?>
    <?php
    global $Template;
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
        <h2 class="center">creat an article</h2>
        <form method="POST" target="_blank" class="form form--article" enctype="multipart/form-data">
            <div class="form__row">
                <label for="title" class="form__label">
                    blog title
                </label>
                <input type="text" class="form__input" name="title" id="title" placeholder="article title"
                    value="<?= $Template->get_data('form-title') ?>">
            </div>
            <div class="form__row">
                <label for="title" class="form__label">
                    blog image
                </label>
                <input type="file" class="form__input" name="image" id="title">
            </div>
            <div class="form__row">
                <label for="article">
                    article
                </label>
                <textarea class="form__textarea" name="markdown"
                    placeholder="article content"><?= $Template->get_data('form-markdown') ?></textarea>
            </div>
            <button class="btn" type="submit" name="update">update</button>
            <button class="btn" type="submit" name="preview">preview</button>
            <button class="btn" name="delete" id="delete">delete</button>
        </form>
    </main>
    <?php include_once './views/elements/v-footer.php'; ?>
</body>

</html>