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
        <h2 class="center">create an article</h2>
        <form method="POST" class="form form--article" enctype="multipart/form-data">
            <div class="form__row">
                <label for="title" class="form__label">
                    blog title
                </label>
                <input type="text" class="form__input" name="title" id="title" placeholder="article title">
            </div>
            <div class="form__row">
                <label for="upload-image" class="form__label">
                    blog image
                </label>
                <div class='upload'>
                    <input type="file" accept="images/*" class="form__input" name="image" id="upload-image">
                    <img id="image" src="#" alt="select an image">
                </div>
            </div>
            <div class="form__row">
                <label for="article">
                    article
                </label>
                <div>type as .md format and it will automaticly be converted to HTML</div>
                <textarea class="form__textarea" name="markdown" placeholder="article content"></textarea>
            </div>
            <button class="btn" type="submit" name="create">create</button>
        </form>
    </main>
    <? include_once './views/elements/v-footer.php'; ?>
</body>

</html>