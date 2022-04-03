<?php
function validate(string $value, string $type): bool
{
    if ($type === 'username') {
        if (empty(trim($value)))
            return FALSE;
        if (strlen($value) < 6)
            return FALSE;
        return TRUE;
    }
    if ($type === 'email') {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    if ($type === 'password') {
        if (empty(trim($value)))
            return FALSE;
        if (strlen($value) < 8)
            return FALSE;
        return TRUE;
    }
    throw new Error("couldn't validate no matching type");
}
function auth(int $flag = 1): void
{
    global $Template;
    // for the view 
    $is_auth = isset($_SESSION['is-auth']) && $_SESSION['is-auth'] === TRUE;
    $is_admin = $is_auth && isset($_SESSION['user']) && $_SESSION['user']['is-admin'];
    if ($flag === 1) {
        // for auth users
        if (!$is_auth) {
            $Template->redirect(SITE_PATH . "/signin.php");
        }
    }
    if ($flag === 2) {
        // for auth users
        if (!$is_admin) {
            $Template->redirect(SITE_PATH . "/signin.php");
        }
    }
    // for the view 
    if ($is_auth) {
        $Template->set_data('is-auth', TRUE);
    }
    if (
        $is_auth &&
        isset($_SESSION['user']) &&
        $_SESSION['user']['is-admin']
    ) {
        $Template->set_data('is-admin', TRUE);
    }
}