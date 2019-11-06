<?php

declare(strict_types=1);

namespace Crazykriz\TextSearch\Algorithm;

use Crazykriz\TextSearch\TextSearch;
use Crazykriz\TextSearch\TextSearchResult;
use Crazykriz\TextSearch\Matching;

/**
 * This class implements the Knuth-Morris-Pratt text search algorithm invented by Donald E. Knuth, James H. Morris and
 * Vaughan R. Pratt in 1977.
 *
 * @author Christian Frunzke
 * @version 1.0.0-dev
 * @since 1.0.0
 */
class KnuthMorrisPrattTextSearch extends TextSearch
{

    /**
     * Constructs a new KnuthMorrisPrattTextSearch object.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        parent::__construct('Knuth-Morris-Pratt');
    }

    /**
     * Starts a new Knuth-Morris-Pratt text search using the specified arguments. The return result is a
     * TextSearchResult object containing the search result. The first argument is a string representing the source text
     * to be searched. The second argument is also a string representing the pattern to be searched for and this one
     * must not be empty, otherwise an exception will be thrown.
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
        $i = 0;
        $j = 0;
        $lps = self::computeLpsArray($pattern);

        while($i < $n) {
            if($pattern[$j] == $sourceText[$i]) {
                $j++;
                $i++;
            }

            if($j == $m) {
                $matchings[] = new Matching($i - $j, $i);
                $j = $lps[$j - 1];
            } else if($i < $n && $pattern[$j] != $sourceText[$i]) {
                if($j != 0) {
                    $j = $lps[$j - 1];
                } else {
                    $i = $i + 1;
                }
            }
        }

        return new TextSearchResult($pattern, $matchings, $this->description, \microtime(true) - $timeStart);
    }

    /**
     * Creates a new LPS array using the specified pattern string.
     *
     * @param string  $pattern  The pattern.
     * @return array  The LPS array.
     * @since 1.0.0
     */
    protected static final function computeLpsArray(string $pattern): array
    {
        $lps = [];
        $len = 0;
        $i = 1;
        $m = \strlen($pattern);

        $lps[0] = 0;

        while($i < $m) {
            if($pattern[$i] == $pattern[$len]) {
                $len++;
                $lps[$i] = $len;
                $i++;
            } else {
                if($len != 0) {
                    $len = $lps[$len - 1];
                } else {
                    $lps[$i] = 0;
                    $i++;
                }
            }
        }

        return $lps;
    }

}
