<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Crazykriz\TextSearch\TextSearcher;

$text = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et' .
    ' dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet' .
    ' clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,' .
    ' consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,' .
    ' sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea' .
    ' takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed' .
    ' diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et' .
    ' accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum' .
    ' dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel' .
    ' illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent' .
    ' luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer' .
    ' adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi' .
    ' enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo' .
    ' consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum' .
    ' dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent';

$pattern = ', s';

$result = TextSearcher::searchSimple($text, $pattern);
var_dump($result);

$result = TextSearcher::searchKnuthMorrisPratt($text, $pattern);
var_dump($result);

$result = TextSearcher::searchRabinKarp($text, $pattern);
var_dump($result);

$result = TextSearcher::searchBoyerMoore($text, $pattern);
var_dump($result);
