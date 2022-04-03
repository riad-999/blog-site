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
                <?= $Template->get_data('article')['title'] ?>
            </h2>

            <section class="article__content">
                <?= $Template->get_data('html') ?>
            </section>
            <?php if ($Template->get_data('is-auth')) { ?>
            <form class="comment-form" method="post" action="./store-comment.php">
                <div class="form__row">
                    <lable class="form__label form__label--big">comment:</lable>
                    <textarea placeholder="comment..." name="comment-content"></textarea>
                </div>
                <input type="hidden" name="article" value="<?= $Template->get_data('id') ?>">
                <button type="submit" name="comment" class="btn form__row">Comment</button>
            </form>
            <?php } ?>

            <section class="comments">
                <?php
                $comments = $Template->get_data('comments');
                if (count($comments)) {
                ?>
                <h3>comments</h3>
                <?php
                    foreach ($Template->get_data('comments') as $comment) { ?>
                <article class="comment">
                    <h5><?= $comment['name'] ?></h5>
                    <p><?= $comment['comment'] ?></p>
                </article>
                <?php
                    }
                } ?>
            </section>
    </main>
</body>

</html>