<?php

declare(strict_types=1);


use Dotenv\Dotenv;

require './vendor/autoload.php';

$dotenv = Dotenv::createImmutable('./');
$dotenv->load();

$ROOT_PATH =  $_SERVER['DOCUMENT_ROOT'] . '/blog';
// database
const HOST_NAME = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'blog-site';
const USERS_TABLE = 'users';
//mailing
$SENDER = getenv('SNEDER');
$SENDER_PASS = getenv('SENDER_PASS');
//others
const SITE_NAME = 'readdaily';
const SITE_PATH = 'http://localhost:8080/blog';