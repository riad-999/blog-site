<?php
include_once './init.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $article = $Post_articles->get_article($id);
    if (!$article) {
        $Template->set_data('error-message', 'invalid paramter');
        $Template->redirect('./error.php');
    }
    $html = markdown($article['content']);
    $Template->set_data('article', $article);
    $Template->set_data('html', $html);
    $Template->load('./views/pages/v-single-article.php');
} else {
    // redirect to error page 
    $Template->set_data('error-message', 'invalid link');
    $Template->redirect('./error.php');
}