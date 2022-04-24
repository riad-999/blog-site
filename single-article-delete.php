<?php
include_once './init.php';
auth(2);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        $article = $Post_articles->get_article($id);
        $Post_articles->delete_article($id);
        if (!unlink($ROOT_PATH . '/views/images/uploads/' . $article['image-name'])) {
            $_SESSION['error-message'] = "something went wrong with the uploaded image";
            $Template->redirect(SITE_PATH . '/error.php');
        }
    } catch (Throwable $error) {
        $_SESSION['error-message'] = $error->getMessage();
        $Template->redirect(SITE_PATH . '/error.php');
    }
    $Template->set_alert('article deleted');
    $Template->redirect(SITE_PATH . '/admin-update.php');
}