<?php
include_once './init.php';
auth();
if (isset($_GET['search'])) {
    $title = trim($_GET['search']);
    $articles = $Post_articles->get_articles_by_title($title);
    $Template->set_data('input-search', htmlentities($title, ENT_QUOTES));
    $Template->set_data('articles', $articles);
    $Template->load($ROOT_PATH . '/views/pages/v-home.php');
    exit();
}
// geting 6 most recent articles 
$articles = $Post_articles->get_article();
$Template->set_data('input-search', '');
$Template->set_data('articles', $articles);
$Template->load($ROOT_PATH . '/views/pages/v-home.php');