<?php
include_once './init.php';
auth(0);
// setting up input data from last submit.
// if no submit then empty as default
$login_inputs = ['email', 'password'];
if (isset($_POST['login'])) {
    foreach ($login_inputs as $input) {
        $Template->set_data($input, htmlentities($_POST[$input], ENT_QUOTES));
    }
} else {
    foreach ($login_inputs as $input) {
        $Template->set_data($input, '');
    }
}
$register_inputs = ['username', 'reg-email', 'reg-password'];
if (isset($_POST['register'])) {
    foreach ($register_inputs as $input) {
        $Template->set_data($input, htmlentities($_POST[$input], ENT_QUOTES));
    }
} else {
    foreach ($register_inputs as $input) {
        $Template->set_data($input, '');
    }
}
// hadling submits 
if (isset($_POST['login'])) {
    // handle login
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $valid = TRUE;
    // supose that all inputs are valid
    // if one of them is not we assign 
    //it to false
    if (!validate($email, 'email')) {
        // invalid email 
        $valid = FALSE;
    }
    if (!validate($password, 'password')) {
        // invalid password
        $valid = FALSE;
    }
    if (!$valid) {
        // set the alert for the view 
        $Template->set_alert('invalid user credetials', 'error');
        include_once './views/pages/v-signin.php';
    } else {
        // check in the database 
        $user = $Post_users->get_user_by_email($email);
        if (!$user) {
            $Template->set_alert('no such email', 'error');
            include './views/pages/v-signin.php';
            exit();
        }
        $user_pass = $user['password'];
        if (!password_verify($password, $user_pass)) {
            $Template->set_alert('wrong password', 'error');
            include './views/pages/v-signin.php';
            exit();
        }
        // correct credentials
        // login the user 
        $is_admin = $user['admin'] === 1 ? TRUE : FALSE;
        $_SESSION['is-auth'] = TRUE;
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'is-admin' => $is_admin
        ];

        $username = $user['username'];
        // redirect to home page 
        $Template->set_alert("welcome $username");
        header("Location: ./");
    }

    exit();
}
if (isset($_POST['register'])) {
    // handle register
    // handle login
    $email = trim($_POST['reg-email']);
    $password = $_POST['reg-password'];
    $username = trim($_POST['username']);
    $notify = isset($_POST['notify']) ? TRUE : FALSE;
    $valid = TRUE;
    // supose that all inputs are valid
    // if one of them is not we assign 
    //it to false
    if (!validate($username, 'username')) {
        $valid = FALSE;
    }
    if (!validate($email, 'email')) {
        // invalid email 
        $valid = FALSE;
    }
    if (!validate($password, 'password')) {
        // invalid password
        $valid = FALSE;
    }
    if (!$valid) {
        // set the alert for the view 
        $Template->set_alert('invalid fields', 'error');
        include_once './views/pages/v-signin.php';
    } else {
        // insert in the data base
        if (!$Post_users->register($username, $email, $password, $notify)) {
            $Template->set_alert("this email : $email is aleready in use", 'error');
        } else {
            $Template->set_alert('account registered', 'success');
        }
        include_once './views/pages/v-signin.php';
    }
    exit();
}
//no submition
//display the page
include './views/pages/v-signin.php';