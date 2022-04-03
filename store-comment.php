<?php
include_once './init.php';
auth();
$article = $_POST['article'];
if (isset($_POST['comment']) && !empty($_POST['comment-content'])) {
    $comment = trim($_POST['comment-content']);
    $user = $_SESSION['user']['id'];
    $Comment->store($user, $article, $comment);
}

$Template->redirect(SITE_PATH . "/single-article.php?id=$article");