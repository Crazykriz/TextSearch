# TextSearch
A free PHP software library for searching texts using various search algorithms

## Introduction
Welcome to TextSearch, a free PHP software library for searching texts using various search algorithms like Knuth-Morris-Pratt or just simple text search. The goal of this PHP library is to make text search as easy as possible for developers, reducing the overhead of results to a minimum.

## Features
Supported text search algorithms:

### v1.0.0

- Simple text search (aka Naive text search)
- Rabin-Karp
- Boyer-Moore
- Knuth-Morris-Pratt

## Requirements
TextSearch requires at minimum:

- PHP 7.3.0 or up

## Installation

### Composer
Open a shell or terminal window and navigate to your PHP project's base folder. Then enter 

`composer require crazykriz/textsearch`

and Composer installs TextSearch to your PHP project.

### Other installers
Not supported yet.

## Getting started
After installation your PHP project can use TextSearch immediately by using the individual text search classes or the more convenient factory class TextSearcher to quickly get a result. To make text search as simple as possible it's recommended to use the factory class only. But let's have a look on several code examples:

### Using factory class TextSearcher

    <?php
    require_once __DIR__ . '/../vendor/autoload.php'; // Using PSR-4 autoloading
    
    use Crazykriz\TextSearch\TextSearcher;
    
    $source = 'This is a simple text going to be searched by the Simple text search algorithm.';
    $pattern = 'is';
    $result = TextSearcher::searchSimple($text, $pattern);
    var_dump($result);

Static method `TextSearcher::searchSimple()` needs two arguments for initialization, a source text and a pattern to be searched for. It returns an object of class `TextSearchResult` representing the result of your text search and provides several information:

- Description of the used text search algorithm (often just the name of the algorithm)
- An array of objects of class `Matching` which contains the start index and ending index of every single matching
- The duration of the performed text search in milliseconds
- The used pattern itself
