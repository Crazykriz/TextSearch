<?php

declare(strict_types=1);

namespace Crazykriz\TextSearch;

use Crazykriz\TextSearch\TextSearchResult;

/**
 * This abstract class is the base class of the TextSearch search algorithm classes hierarchy. All genuine TextSearch
 * algorithms are derived from this class.
 *
 * @author Christian Frunzke
 * @version 1.0.0-dev
 * @since 1.0.0
 */
abstract class TextSearch
{

    /**
     * The brief description of the used text search algorithm.
     *
     * @var string
     * @since 1.0.0
     */
    protected $description;

    /**
     * Constructs a new TextSearch object optionally initialized with the specified argument. The optional argument is a
     * string representing a brief description of the used text search algorithm. The default value is an empty string.
     *
     * @param string  $description  [optional] The text search algorithm description.
     * @since 1.0.0
     */
    protected function __construct(string $description = '')
    {
        $this->description = $description;
    }

    /**
     * Starts a new text search using the specified arguments. The return result is a TextSearchResult object containing
     * the search result. The first argument is a string representing the source text to be searched. The second
     * argument is also a string representing the pattern to be searched for and this one must not be empty,
     * otherwise an exception will be thrown.
     *
     * @param string  $sourceText  The source text to be searched.
     * @param string  $pattern     The pattern to be searched for.
     * @return TextSearchResult  A new TextSearchResult object.
     * @throws \InvalidArgumentException  If the passed pattern string was empty.
     * @since 1.0.0
     */
    public abstract function search(string $sourceText, string $pattern): TextSearchResult;

    /**
     * Returns the text search algorithm description.
     *
     * @return string  The text search algorithm description.
     * @since 1.0.0
     */
    function description(): string
    {
        return $this->description;
    }

}
