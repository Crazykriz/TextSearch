# TextSearch
A free PHP software library for searching texts using various search algorithms

## Table of content
1. [Introduction](#introduction)
2. [Features](#features)
3. [Requirements](#requirements)

<a name="introduction"></a>
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
    use Crazykriz\TextSearch\TextSearcher;
    
    $source = 'This is a simple text going to be searched by the Simple text search algorithm.';
    $pattern = 'is';
    $result = TextSearcher::searchSimple($source, $pattern);
    var_dump($result);

The dumped result should look like this (with activated Xdebug):

    object(Crazykriz\TextSearch\TextSearchResult)[5]
        protected 'pattern' => string 'is' (length=2)
        protected 'matchings' => 
            array (size=2)
                0 => 
                    object(Crazykriz\TextSearch\Matching)[2]
                        protected 'indexStart' => int 2
                        protected 'indexEnding' => int 4
                1 => 
                    object(Crazykriz\TextSearch\Matching)[4]
                        protected 'indexStart' => int 5
                        protected 'indexEnding' => int 7
        protected 'algorithm' => string 'Simple text search (aka Naive text search)' (length=42)
        protected 'duration' => float 0

Static method `TextSearcher::searchSimple()` needs two arguments for initialization, a source text and a pattern to be searched for. It returns a `TextSearchResult` object representing the result of your text search and provides several information:

- Description of the used text search algorithm (often just the name of the algorithm)
- An array of `Matching` objects containing the start index and ending index of every single matching
- The duration of the performed text search in milliseconds
- The used pattern itself

### Using text search classes

TextSearch provides several different text search algorithms with different capabilities and of course different performance rates. Nevertheless the interface to all algorithms is always the same and simplified for your convenience. All you have to do is to instantiate a new text search object of your preferred algorithm and call method `search(...)`. As explained above in the factory class example this method awaits both a source text and the pattern to be searched for. Let's have a look again on Simple text search but now using the classic way:

    <?php
    use Crazykriz\TextSearch\Algorithm\SimpleTextSearch
    
    $source = 'This is a simple text going to be searched by the Simple text search algorithm.';
    $pattern = 'is';
    $textSearch = new SimpleTextSearch();
    $result = $textSearch->search($source, $pattern);
    var_dump($result);

The expected result is (with activated Xdebug):

    C:\xampp\htdocs\textsearch\tests\test2.php:11:
    object(Crazykriz\TextSearch\TextSearchResult)[5]
        protected 'pattern' => string 'is' (length=2)
        protected 'matchings' => 
            array (size=2)
                0 => 
                    object(Crazykriz\TextSearch\Matching)[2]
                        protected 'indexStart' => int 2
                        protected 'indexEnding' => int 4
                1 => 
                    object(Crazykriz\TextSearch\Matching)[4]
                        protected 'indexStart' => int 5
                        protected 'indexEnding' => int 7
        protected 'algorithm' => string 'Simple text search (aka Naive text search)' (length=42)
        protected 'duration' => float 0
        
If you want to use another text search algorithm instead just replace the class by you favourite text search class.

## Factory class `TextSearcher`

Factory class `TextSearcher` is the most quickest way to get a text searched. Each algorithm who is available in the recent version of TextSearch is also available as a static method in the factory class; plus a static method which allows you to choose the right algorithm during runtime.

As shown in the factory class example before all you need is to reference class `TextSearcher` in the namespace and call its static methods:

    <?php
    use Crazykriz\TextSearch\TextSearcher;
    
    $result = TextSearcher::searchRabinKarp($source, $pattern);

If you need some dynamical algorithm choice during runtime just use the static `search(...)` method:

    <?php
    use Crazykriz\TextSearch\TextSearcher;
    use Crazykriz\TextSearch\Algorithm\SimpleTextSearch;
    use Crazykriz\TextSearch\Algorithm\RabinKarpTextSearch;
    use Crazykriz\TextSearch\Algorithm\BoyerMooreTextSearch;
    use Crazykriz\TextSearch\Algorithm\KnuthMorrisPrattTextSearch;
    
    define('SIMPLE', 0);
    define('RABIN_KARP', 1);
    define('BOYER_MOORE', 2);
    define('KNUTH_MORRIS_PRATT', 3);
     
    $algorithm = null;
    
    switch(RABIN_KARP) 
    {
        case RABIN_KARP:
            $algorithm = new RabinKarpTextSearch();
            break;
        case BOYER_MOORE:
            $algorithm = new BoyerMooreTextSearch();
            break;
        case KNUTH_MORRIS_PRATT:
            $algorithm = new KnuthMorrisPrattTextSearch();
            break;
        default:
            $algorithm = new SimpleTextSearch();
            break;
    }
            
    $result = TextSearcher::search($algorithm, $source, $pattern);

