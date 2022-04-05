<?php
include_once './init.php';
auth(2);
if (isset($_GET['search'])) {
    $title = trim($_GET['search']);
    $articles = $Post_articles->get_articles_by_title($title);
    $Template->set_data('articles', $articles);
    $Template->set_data('input-search', htmlentities($title, ENT_QUOTES));
    $Template->load($ROOT_PATH . '/views/pages/v-admin-update.php');
    exit();
}
$Template->set_data('articles', $Post_articles->get_articles_by_title(''));
$Template->load($ROOT_PATH . '/views/pages/v-admin-update.php');