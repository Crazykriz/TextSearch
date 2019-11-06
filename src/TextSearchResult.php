<?php

declare(strict_types=1);

namespace Crazykriz\TextSearch;

use Crazykriz\TextSearch\Matching;

/**
 * This class implements a text search result. A typical text search result provides a begin index where a pattern has
 * been found in a source text and the pattern itself.
 *
 * @author Christian
 */
class TextSearchResult
{

    /**
     * The used pattern.
     *
     * @var string
     * @since 1.0.0
     */
    protected $pattern;

    /**
     * The array of Matching objects.
     *
     * @var array
     * @since 1.0.0
     */
    protected $matchings;

    /**
     * The brief description of the used text search algorithm.
     *
     * @var string
     * @since 1.0.0
     */
    protected $algorithm;

    /**
     * The total duration of the search process in milliseconds (PHP micro time) or NULL if the value is not available.
     *
     * @var float|null
     * @since 1.0.0
     */
    protected $duration;

    /**
     * Constructs a new TextSeachResult object initialized with the specified arguments. The first argument is a string
     * representing the pattern and must not be empty otherwise an exception will be thrown. The second argument is
     * an array of Matching objects and can be empty. The optional third argument is a string representing a brief
     * description of the used text search algorithm. The default is an empty string. The optional fourth argument is
     * either a float value representing the duration time in milliseconds (PHP micro time) or NULL if this property
     * should not be initialized anyway. In such case no duration is available and will also be NULL on request.
     *
     * @param string      $pattern  The pattern.
     * @param array       $matchings   The array of Matching objects.
     * @param string      $algorithm   [optional] The brief description of the used text search algorithm.
     * @param float|null  $duration    [optional] The duration in milliseconds (PHP micro time) or NULL.
     * @throws \InvalidArgumentException  If the passed pattern was empty.
     * @since 1.0.0
     */
    public function __construct(string $pattern, array $matchings, string $algorithm = '', ?float $duration = null)
    {
        if(empty($pattern)) {
            throw new \InvalidArgumentException('Pattern was empty!');
        } else if(!$this->isValidMatchingsArray($matchings)) {
            throw new \InvalidArgumentException('Invalid matchings array!');
        }

        $this->pattern = $pattern;
        $this->matchings = $matchings;
        $this->algorithm = $algorithm;
        $this->duration = $duration;
    }

    /**
     * Returns a string representing the pattern.
     *
     * @return string  The pattern.
     * @since 1.0.0
     */
    public function pattern(): string
    {
        return $this->pattern;
    }

    /**
     * Returns the matchings array. The return result is an array of Matching objects or an empty array if no matchings
     * were found.
     *
     * @return array  The array of Matching objects or an empty array if no matchings were found.
     * @since 1.0.0
     */
    public function getMatchings(): array
    {
        return $this->matchings;
    }

    /**
     * Returns a string representing the brief description of the used text search algorithm.
     *
     * @return string  The brief description of the used text search algorithm.
     * @since 1.0.0
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * Returns a float value representing the duration of the text search in milliseconds (PHP micro time) or NULL if
     * this value is not available.
     *
     * @return float|null  The duration in milliseconds or NULL if not available.
     * @since 1.0.0
     */
    public function getDuration(): ?float
    {
        return $this->duration;
    }

    /**
     * Checks if the passed array is a valid matchings array. This method checks if all elements of the passed array are
     * objects of class Matching. The return result is TRUE if and only if the passed array is not empty and all
     * elements are objects of class Matching.
     *
     * @param array  $matchings  The array to be checked.
     * @return bool  TRUE if passed array is valid, FALSE otherwise.
     * @since 1.0.0
     */
    protected final function isValidMatchingsArray(array $matchings): bool
    {
        $result = true;

        foreach($matchings as $matching) {
            if(!($matching instanceof Matching)) {
                $result = false;
                break;
            }
        }

        return $result;
    }

}
