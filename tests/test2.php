<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Using PSR-4 autoloading

use Crazykriz\TextSearch\Algorithm\SimpleTextSearch;

$source = 'This is a simple text going to be searched by the Simple text search algorithm.';
$pattern = 'is';
$textSearch = new SimpleTextSearch();
$result = $textSearch->search($source, $pattern);
var_dump($result);
