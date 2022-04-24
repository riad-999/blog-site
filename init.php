<?php
session_start();

include_once './config.php';
include_once './database/connect.php';

include_once  './helpers/template.php';
include_once './helpers/markdown.php';
include_once './helpers/utils.php';
// include_once './helpers/mail.php';

include_once './models/m-post-user.php';
include_once './models/m-post-blog.php';
include_once './models/m-comment.php';

// $Mail = new Mail('felihriad4@gmail.com', 'aezakmidz');
$Post_users = new Post_users($Database);
$Post_articles = new Post_articles($Database);
$Comment = new Comment($Database);
$Template = new Template();


// {
//     "require": {
//         "phpmailer/phpmailer": "^6.5",
//         "vlucas/phpdotenv": "^5.3",
//         "michelf/php-markdown": "^1.9"
//     }
// }