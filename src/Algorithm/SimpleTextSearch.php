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
 * This class implements the Simple text search aka Naive text search algorithm.
 *
 * @author Christian Frunzke
 * @version 1.0.0-dev
 * @since 1.0.0
 */
class SimpleTextSearch extends TextSearch
{

    /**
     * Constructs a new SimpleTextSearch object.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        parent::__construct('Simple text search (aka Naive text search)');
    }

    /**
     * Starts a new simple text search using the specified arguments. The return result is a TextSearchResult object
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

        for($i = 0; $i <= $n - $m; $i++) {
            for($j = 0; $j < $m; $j++) {
                if($sourceText[$i + $j] != $pattern[$j]) {
                    break;
                }
            }

            if($j == $m) {
                $matchings[] = new Matching($i, $i + $m);
            }
        }

        return new TextSearchResult($pattern, $matchings, $this->description, \microtime(true) - $timeStart);
    }

}