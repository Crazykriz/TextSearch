<?php

declare(strict_types=1);

namespace Crazykriz\TextSearch\Algorithm;

use Crazykriz\TextSearch\TextSearch;
use Crazykriz\TextSearch\TextSearchResult;
use Crazykriz\TextSearch\Matching;

/**
 * This class implements the Boyer-Moore text search algorithm invented by Robert S. Boyer and J Strother Moore in 1977.
 *
 * @author Christian Frunzke
 * @version 1.0.0-dev
 * @since 1.0.0
 */
class BoyerMooreTextSearch extends TextSearch
{

    /**
     * Constructs a new BoyerMooreTextSearch object.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        parent::__construct('Boyer-Moore');
    }

    /**
     * Starts a new Boyer-Moore text search using the specified arguments. The return result is a TextSearchResult
     * object containing the search result. The first argument is a string representing the source text to be searched.
     * The second argument is also a string representing the pattern to be searched for and this one must not be empty,
     * otherwise an exception will be thrown.
     *
     * @param string  $sourceText  The source text to be searched.
     * @param string  $pattern     The pattern to be searched for.
     * @return TextSearchResult  A new TextSearchResult object.
     * @throws \InvalidArgumentException  If the passed pattern string was empty.
     * @since 1.0.0
     */
    public function search(string $sourceText, string $pattern): TextSearchResult
    {
        $matchings = [];
        $timeStart = \microtime(true);
        $m = \strlen($pattern);
        $n = \strlen($sourceText);
        $table = self::createCharTable($pattern);

        for($i = $m - 1; $i < $n;) {
            $t = $i;

            for($j = $m - 1; $pattern[$j] == $sourceText[$i]; $j--, $i--) {
                if($j == 0) {
                    $matchings[] = new Matching($i, $i + $m);
                }
            }

            $i = $t;

            if(array_key_exists($sourceText[$i], $table)) {
                $i = $i + max($table[$sourceText[$i]], 1);
            } else {
                $i += $m;
            }
        }

        return new TextSearchResult($pattern, $matchings, $this->description, \microtime(true) - $timeStart);
    }

    /**
     * Creates a new character table using the specified pattern string. The return result is an array of characters
     * assigned with the computed value.
     *
     * @param string  $pattern  The pattern.
     * @return array  The array representing the characters table.
     * @since 1.0.0
     */
    protected static final function createCharTable(string $pattern): array
    {
        $table = [];
        $len = \strlen($pattern);

        for($i = 0; $i < $len; $i++) {
            $table[$pattern[$i]] = $len - $i - 1;
        }

        return $table;
    }

}
