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
    <main class="main-content">
        <section class="main-content-intro">
            <h1 class="focal-1">
                re<span>ad daily</span>
            </h1>
            <form class="search-form">
                <!-- <label class="form__label form__label--big" for="main-search">
                    search
                </label> -->
                <div class="form-row">
                    <input type="search" placeholder="search for blogs" class="search-input" name="search" value="">
                </div>
                <button type="submit" class="btn btn--search">
                    search
                </button>
            </form>
        </section>
        <section class="blogs">
            <header>
                <h3>
                    blogs
                </h3>
                <div class="title__underline"></div>
            </header>
            <main class="blogs-wrapper">
                <?php
                $articles = $Template->get_data('articles');
                if (count($articles) == 0) echo "empty array";
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
                        <button type="button" class="btn btn--block">
                            <a href="./single-article.php?id=<?= $article['id'] ?>">
                                read
                            </a>
                        </button>
                    </div>
                </article>
                <?php
                }
                ?>
            </main>
        </section>
    </main>
    <? include_once './views/elements/v-footer.php'; ?>
</body>

</html>