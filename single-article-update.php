<?php
include_once './init.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $article = $Post_articles->get_article($id);
    if (!$article) {
        $_SESSION['error-message'] = 'article not found';
        $Template->redirect($ROOT_PATH . '/error.php');
    }
    $Template->set_data('article', $article);
    $Template->load($ROOT_PATH . '/views/pages/v-single-article-update.php');
} else {
    $_SESSION['error-message'] = 'invalid parameter';
    $Template->redirect($ROOT_PATH . '/error.php');
}