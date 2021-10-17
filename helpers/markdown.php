<?php
require 'vendor/autoload.php';

use Michelf\Markdown;

function markdown(string $markdown): string
{
    $html = Markdown::defaultTransform($markdown);
    return $html;
}