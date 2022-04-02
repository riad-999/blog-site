<!DOCTYPE html>
<html lang="en">
<?php include_once './views/elements/v-head.php'; ?>

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
    <section class="confirm__wrapper hidden">
        <main class="confirm">
            <div>
                are you sure you want to delete this post?
            </div>
            <div class="mt-1">
                <button class="btn">
                    <a href="<?= SITE_PATH . '/single-article-delete.php?id=' ?>" id="yes-btn">
                        yes
                    </a>
                </button>
                <button class="btn" id="cancel-btn">
                    cancel
                </button>
            </div>
        </main>
    </section>
    <main class="main-content">
        <form class="search-form margin-top margin-bottom">
            <div class="form-row">
                <input type="search" placeholder="search for blogs" class="search-input" name="search"
                    value="<?= $Template->get_data('input-search') ?>">
            </div>
            <button type="submit" class="btn btn--search">
                search
            </button>
        </form>
        <section class="blogs-wrapper">
            <?php
            $articles = $Template->get_data('articles');
            foreach ($articles as $article) {
            ?>
            <article class="blog">
                <div class="blog__img__wrapper">
                    <img src="./views/images/uploads/<?= $article['image_name'] ?>" alt="article image"
                        class="blog__img">
                </div>
                <div class="blog__info">
                    <h4 class="blog__title">
                        <?= $article['title'] ?>
                    </h4>
                    <date class="blog__desc">
                        <?= explode(' ', $article['date'])[0] ?>
                    </date>
                    <button type="button" class="btn btn--block mt-1">
                        <a href="./single-article-update.php?id=<?= $article['id'] ?>">
                            Update
                        </a>
                    </button>
                    <button type="button" class="btn btn--block mt-1 delete" data-id="<?= $article['id'] ?>">
                        Delete
                    </button>
                </div>
            </article>
            <?php
            }
            ?>
        </section>
        <?php
        if (count($articles) === 0) {
        ?>
        <div class="center">
            no matching articles for your search.
        </div>
        <?php } ?>
    </main>
</body>

</html>