<?php
include_once './init.php';
auth();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        $Post_articles->delete_article($id);
    } catch (Throwable $error) {
        $_SESSION['error-message'] = $error->getMessage();
        $Template->redirect(SITE_PATH . '/error.php');
    }
    $Template->set_alert('article deleted');
    $Template->redirect(SITE_PATH . '/admin-update');
}