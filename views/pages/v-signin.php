<!DOCTYPE html>
<html lang="en">
<?php include_once './views/elements/v-head.php'; ?>

<body>
    <?php include_once './views/elements/v-navbar.php'; ?>
    <main class="signin">
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
        <h3 class="center">login</h3>
        <form action="" method="POST" class="form from--login">
            <small>login as admin : (admin@gmail.com admin147)</small>
            <br />
            <small>login as normal: (normal@gmail.com normal147)</small>
            <br />
            <small>or you can register</small>
            <div class="form__row">
                <label class="form__label" for="email">
                    email
                </label>
                <input type="email" name="email" class="form__input" value="<?= $Template->get_data('email') ?>"
                    id="email" placeholder="email">
            </div>

            <div class="form__row bottom-spacing">
                <label class="form__label" for="password">
                    password
                </label>
                <input type="password" name="password" class="form__input"
                    value="<?= $Template->get_data('password') ?>" id="password" placeholder="password">
            </div>

            <button type="submit" name="login" class="btn btn--block">
                login
            </button>
        </form>
        <h3 class="center">or register</h3>
        <form action="" method="POST" class="form from--login">
            <div class="form__row">
                <label class="form__label" for="username">
                    username
                </label>
                <input type="text" name="username" class="form__input" value="<?= $Template->get_data('username') ?>"
                    id="username" placeholder="username">
            </div>

            <div class="form__row">
                <label class="form__label" for="reg-email">
                    email
                </label>
                <input type="email" name="reg-email" class="form__input" value="<?= $Template->get_data('reg-email') ?>"
                    id="reg-email" placeholder="email">
            </div>
            <div class="form__row">
                <label class="form__label" for="reg-password">
                    password
                </label>
                <input type="password" name="reg-password" class="form__input"
                    value="<?= $Template->get_data('reg-password') ?>" id="reg-password" placeholder="password">
            </div>

            <div class="form_row bottom-spacing">
                <input type="checkbox" id="notify" class="checkbox" name="notify" value="yes">
                <lable for="notify">
                    notify me whenver a new blog comes out
                </lable>
            </div>

            <button type="submit" name="register" class="btn btn--block">
                register
            </button>
        </form>
    </main>
</body>

</html>