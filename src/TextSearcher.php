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

namespace Crazykriz\TextSearch;

use Crazykriz\TextSearch\TextSearch;
use Crazykriz\TextSearch\TextSearchResult;
use Crazykriz\TextSearch\Algorithm\SimpleTextSearch;
use Crazykriz\TextSearch\Algorithm\RabinKarpTextSearch;
use Crazykriz\TextSearch\Algorithm\BoyerMooreTextSearch;
use Crazykriz\TextSearch\Algorithm\KnuthMorrisPrattTextSearch;

/**
 * This factoy class provides easy access to all available text search algorithms.
 *
 * @author Christian Frunzke
 * @version 1.0.0-dev
 * @since 1.0.0
 */
final class TextSearcher
{

    /**
     * Searches a text using the specified algorithm, source text and pattern. The first argument is a TextSearch object
     * representing the text search algorithm to be used. The second argument is a string representing the source text
     * to be searched. The third argument is a string representing the pattern to be searched for. The passed pattern
     * must not be emtpy otherwise an exception will be thrown. The return result is a new TextSearchResult object.
     *
     * @param TextSearch  $algorithm   The TextSearch object implementing the desired text search algorithm.
     * @param string      $sourceText  The source text to be searched.
     * @param string      $pattern     The pattern to be searched for.
     * @return TextSearchResult  A new TextSearchResult object.
     * @throws \InvalidArgumentException  If the passed pattern was empty.
     * @since 1.0.0
     */
    public static function search(TextSearch $algorithm, string $sourceText, string $pattern): TextSearchResult
    {
        return $algorithm->search($sourceText, $pattern);
    }

    /**
     * Searches a text using the Simple Text Search algorithm and specified source text and pattern. The first argument
     * is a string representing the source text to be searched. The second argument is a string representing the pattern
     * to be searched for. The passed pattern must not be emtpy otherwise an exception will be thrown. The return result
     * is a new TextSearchResult object.
     *
     * @param string  $sourceText  The source text to be searched.
     * @param string  $pattern     The pattern to be searched for.
     * @return TextSearchResult  A new TextSearchResult object.
     * @throws \InvalidArgumentException  If the passed pattern was empty.
     * @since 1.0.0
     */
    public static function searchSimple(string $sourceText, string $pattern)
    {
        return self::search(new SimpleTextSearch(), $sourceText, $pattern);
    }

    /**
     * Searches a text using the Rabin-Karp algorithm and specified source text and pattern. The first argument is a
     * string representing the source text to be searched. The second argument is a string representing the pattern to
     * be searched for. The passed pattern must not be emtpy otherwise an exception will be thrown. The return result is
     * a new TextSearchResult object.
     *
     * @param string  $sourceText  The source text to be searched.
     * @param string  $pattern     The pattern to be searched for.
     * @return TextSearchResult  A new TextSearchResult object.
     * @throws \InvalidArgumentException  If the passed pattern was empty.
     * @since 1.0.0
     */
    public static function searchRabinKarp(string $sourceText, string $pattern)
    {
        return self::search(new RabinKarpTextSearch(), $sourceText, $pattern);
    }

    /**
     * Searches a text using the Boyer-Moore algorithm and specified source text and pattern. The first argument is a
     * string representing the source text to be searched. The second argument is a string representing the pattern to
     * be searched for. The passed pattern must not be emtpy otherwise an exception will be thrown. The return result is
     * a new TextSearchResult object.
     *
     * @param string  $sourceText  The source text to be searched.
     * @param string  $pattern     The pattern to be searched for.
     * @return TextSearchResult  A new TextSearchResult object.
     * @throws \InvalidArgumentException  If the passed pattern was empty.
     * @since 1.0.0
     */
    public static function searchBoyerMoore(string $sourceText, string $pattern)
    {
        return self::search(new BoyerMooreTextSearch(), $sourceText, $pattern);
    }

    /**
     * Searches a text using the Knuth-Morris-Pratt algorithm and specified source text and pattern. The first argument
     * is a string representing the source text to be searched. The second argument is a string representing the pattern
     * to be searched for. The passed pattern must not be emtpy otherwise an exception will be thrown. The return result
     * is a new TextSearchResult object.
     *
     * @param string  $sourceText  The source text to be searched.
     * @param string  $pattern     The pattern to be searched for.
     * @return TextSearchResult  A new TextSearchResult object.
     * @throws \InvalidArgumentException  If the passed pattern was empty.
     * @since 1.0.0
     */
    public static function searchKnuthMorrisPratt(string $sourceText, string $pattern)
    {
        return self::search(new KnuthMorrisPrattTextSearch(), $sourceText, $pattern);
    }

}
