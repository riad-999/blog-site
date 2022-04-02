<?php
include_once './init.php';
auth();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        $article = $Post_articles->get_article($id);
    } catch (Throwable $error) {
        $_SESSION['error-message'] = $error->getMessage();
        $Template->redirect(SITE_PATH . '/error.php');
    }
    if (!$article) {
        $_SESSION['error-message'] = 'article not found';
        $Template->redirect($ROOT_PATH . '/error.php');
    }
    $_SESSION['article'] = $article;
    $Template->redirect(SITE_PATH . '/single-article-handle-form-update.php');
} else {
    $_SESSION['error-message'] = 'invalid parameter';
    $Template->redirect($ROOT_PATH . '/error.php');
}