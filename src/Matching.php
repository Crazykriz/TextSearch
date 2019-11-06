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
