<?php
include_once './init.php';
auth();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $article = $Post_articles->get_article($id);
    if (!$article) {
        $_SESSION['error-message'] = 'invalid paramter';
        $Template->redirect('./error.php');
    }
    $html = markdown($article['content']);
    $Template->set_data('article', $article);
    $Template->set_data('id', $id);
    $Template->set_data('html', $html);
    $comments = $Comment->index($id);
    $Template->set_data('comments', $comments);
    $Template->load('./views/pages/v-single-article.php');
} else {
    // redirect to error page 
    $_SESSION['error-message'] = 'invalid link';
    $Template->redirect('./error.php');
}