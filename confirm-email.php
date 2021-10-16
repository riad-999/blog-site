<?php
include './init.php';

$check_params = isset($_GET['email']) && isset($_GET['hash']);
if (!$check_params) {
    // invalid link 
    exit();
}
$activated = $Post_users->confirm_account($_GET['email'], $_GET['hash']);
if ($activated) {
    echo 'your account is activated';
} else {
    echo 'error';
}