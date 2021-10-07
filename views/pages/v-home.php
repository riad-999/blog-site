<!DOCTYPE html>
<html lang="en">
<?php include_once './views/elements/v-head.php'; ?>

<body>
    <?php include_once './views/elements/v-navbar.php'; ?>
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
                <article class="blog">
                    <div class="blog__img__wrapper">
                        <img src="./views/images/ball.jpg" alt="" class="blog__img">
                    </div>
                    <div class="blog__info">
                        <h4 class="blog__title">
                            title here
                        </h4>
                        <p class="blog__desc">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus sunt excepturi eum eligendi
                            exercitationem aperiam eius aliquam dolores, dolor at.
                        </p>
                        <button type="button" class="btn btn--block">
                            read
                        </button>
                    </div>
                </article>
                <article class="blog">
                    <div class="blog__img__wrapper">
                        <img src="./views/images/ball.jpg" alt="" class="blog__img">
                    </div>
                    <div class="blog__info">
                        <h4 class="blog__title">
                            title here
                        </h4>
                        <p class="blog__desc">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus sunt excepturi eum eligendi
                            exercitationem aperiam eius aliquam dolores, dolor at.
                        </p>
                        <button type="button" class="btn btn--block">
                            read
                        </button>
                    </div>
                </article>
                <article class="blog">
                    <div class="blog__img__wrapper">
                        <img src="./views/images/ball.jpg" alt="" class="blog__img">
                    </div>
                    <div class="blog__info">
                        <h4 class="blog__title">
                            title here
                        </h4>
                        <p class="blog__desc">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus sunt excepturi eum eligendi
                            exercitationem aperiam eius aliquam dolores, dolor at.
                        </p>
                        <button type="button" class="btn btn--block">
                            read
                        </button>
                    </div>
                </article>
                <article class="blog">
                    <div class="blog__img__wrapper">
                        <img src="./views/images/ball.jpg" alt="" class="blog__img">
                    </div>
                    <div class="blog__info">
                        <h4 class="blog__title">
                            title here
                        </h4>
                        <p class="blog__desc">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus sunt excepturi eum eligendi
                            exercitationem aperiam eius aliquam dolores, dolor at.
                        </p>
                        <button type="button" class="btn btn--block">
                            read
                        </button>
                    </div>
                </article>
                <article class="blog">
                    <div class="blog__img__wrapper">
                        <img src="./views/images/ball.jpg" alt="" class="blog__img">
                    </div>
                    <div class="blog__info">
                        <h4 class="blog__title">
                            title here
                        </h4>
                        <p class="blog__desc">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus sunt excepturi eum eligendi
                            exercitationem aperiam eius aliquam dolores, dolor at.
                        </p>
                        <button type="button" class="btn btn--block">
                            read
                        </button>
                    </div>
                </article>
                <article class="blog">
                    <div class="blog__img__wrapper">
                        <img src="./views/images/ball.jpg" alt="" class="blog__img">
                    </div>
                    <div class="blog__info">
                        <h4 class="blog__title">
                            title here
                        </h4>
                        <p class="blog__desc">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus sunt excepturi eum eligendi
                            exercitationem aperiam eius aliquam dolores, dolor at.
                        </p>
                        <button type="button" class="btn btn--block">
                            read
                        </button>
                    </div>
                </article>
            </main>
        </section>
    </main>
    <? include_once './views/elements/v-footer.php'; ?>
</body>

</html>