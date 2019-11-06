<?php

declare(strict_types=1);

namespace Crazykriz\TextSearch;

/**
 * This class implements a text search matching. Inside there are both start index and ending index of the found
 * matching.
 *
 * @author Christian Frunzke
 * @version 1.0.0-dev
 * @since 1.0.0
 */
class Matching
{

    /**
     * The start index.
     *
     * @var int
     * @since 1.0.0
     */
    protected $indexStart;

    /**
     * The ending index.
     *
     * @var int
     * @since 1.0.0
     */
    protected $indexEnding;

    /**
     * Constructs a new Matching object initialized with the specified arguments. The first argument is an integer value
     * representing the start index and must not be less than zero, otherwise an exception will be thrown. The second
     * argument is an integer value representing the ending index and must not be less than zero or less than or equal
     * to the passed start index, otherwise an exception will be thrown.
     *
     * @param int  $indexStart   The start index.
     * @param int  $indexEnding  The ending index.
     * @throws \InvalidArgumentException  If the passed start index was less than zero or if the passed ending index was
     *                                    less than zero or less than or equal to the passed start index.
     * @since 1.0.0
     */
    public function __construct(int $indexStart, int $indexEnding)
    {
        if($indexEnding < 0) {
            throw new \InvalidArgumentException('Invalid start index!');
        } else if($indexEnding < 0 || $indexEnding <= $indexStart) {
            throw new \InvalidArgumentException('Invalid ending index!');
        }

        $this->indexStart = $indexStart;
        $this->indexEnding = $indexEnding;
    }

    /**
     * Returns the start index.
     *
     * @return int  The start index.
     * @since 1.0.0
     */
    public function indexStart(): int
    {
        return $this->indexStart;
    }

    /**
     * Returns the ending index.
     *
     * @return int  The sending index.
     * @since 1.0.0
     */
    public function indexEnding(): int
    {
        return $this->indexEnding;
    }

}
