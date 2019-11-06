<?php

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
