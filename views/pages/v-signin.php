<!DOCTYPE html>
<html lang="en">
<?php include_once './views/elements/v-head.php'; ?>

<body>
    <?php include_once './views/elements/v-navbar.php'; ?>
    <main class="signin">
        <h3 class="center">login</h3>
        <form action="./login.php" method="POST" class="form from--login">
            <div class="form__row">
                <label class="form__label" for="email">
                    email
                </label>
                <input type="email" class="form__input" value="" id="email" placeholder="email">
            </div>

            <div class="form__row bottom-spacing">
                <label class="form__label" for="password">
                    password
                </label>
                <input type="password" class="form__input" value="" id="password" placeholder="password">
            </div>

            <button type="submit" name="login" class="btn btn--block">
                login
            </button>
        </form>
        <h3 class="center">or register</h3>
        <form action="./register.php" method="POST" class="form from--login">
            <div class="form__row">
                <label class="form__label" for="username">
                    username
                </label>
                <input type="text" class="form__input" value="" id="username" placeholder="username">
            </div>

            <div class="form__row">
                <label class="form__label" for="reg-email">
                    email
                </label>
                <input type="reg-email" class="form__input" value="" id="reg-email" placeholder="email">
            </div>
            <div class="form__row">
                <label class="form__label" for="reg-password">
                    password
                </label>
                <input type="password" class="form__input" value="" id="reg-password" placeholder="password">
            </div>

            <div class="form_row bottom-spacing">
                <input type="checkbox" id="notify" class="checkbox" name="notify">
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