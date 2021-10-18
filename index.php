<?php
include_once './init.php';
$is_auth = isset($_SESSION['is-auth']) && $_SESSION['is-auth'] === TRUE;
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
// geting 6 most recent articles 
$articles = $Post_articles->get_article();
$Template->set_data('articles', $articles);
include_once './views/pages/v-home.php';