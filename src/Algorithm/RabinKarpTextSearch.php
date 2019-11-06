<?php

/*
 * The MIT License
 *
 * Copyright 2019 Crazykriz.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

declare(strict_types=1);

namespace Crazykriz\TextSearch\Algorithm;

use Crazykriz\TextSearch\TextSearch;
use Crazykriz\TextSearch\TextSearchResult;
use Crazykriz\TextSearch\Matching;

/**
 * This class implements the Rabin-Karp text search algorithm invented by Michael O. Rabin and Richard M. Karp in 1987.
 *
 * @author Christian Frunzke
 * @version 1.0.0-dev
 * @since 1.0.0
 */
class RabinKarpTextSearch extends TextSearch
{

    /**
     * Constructs a new RabinKarpTextSearch object.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        parent::__construct('Rabin-Karp');
    }

    /**
     * Starts a new Rabin-Karp text search using the specified arguments. The return result is a TextSearchResult object
     * containing the search result. The first argument is a string representing the source text to be searched. The
     * second argument is also a string representing the pattern to be searched for and this one must not be empty,
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
        $p = 0; // hash value for pattern
        $t = 0; // hash value for text
        $h = 1;
        $d = 256; // number of characters in input alphabet
        $q = 11; // prime number

        for($i = 0; $i < $m - 1; $i++) {
            $h = ($h * $d) % $q;
        }

        for($i = 0; $i < $m; $i++) {
            $p = ($d * $p + \ord($pattern[$i])) % $q;
            $t = ($d * $t + \ord($sourceText[$i])) % $q;
        }

        for($i = 0; $i <= $n - $m; $i++) {
            if($p == $t) {
                for($j = 0; $j < $m; $j++) {
                    if($sourceText[$i + $j] != $pattern[$j]) {
                        break;
                    }
                }
                if($j == $m) {
                    $matchings[] = new Matching($i, $i + $m);
                }
            }
            if($i < $n - $m) {
                $t = ($d * ($t - \ord($sourceText[$i]) * $h) + \ord($sourceText[$i + $m])) % $q;
                if($t < 0) {
                    $t = ($t + $q);
                }
            }
        }

        return new TextSearchResult($pattern, $matchings, $this->description, \microtime(true) - $timeStart);
    }

}
