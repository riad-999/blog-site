<?php
session_start();

include_once './config.php';
include_once './database/connect.php';

include_once  './helpers/template.php';
include_once './helpers/validate.php';
include_once './helpers/mail.php';

include_once './models/m-post-user.php';

$Mail = new Mail('felihriad4@gmail.com', 'aezakmidz');
$Post_users = new Post_users($Database);
$Template = new Template();