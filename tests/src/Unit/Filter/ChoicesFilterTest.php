<?php
/*
 * This file is part of the Gea package.
 *
 * (c) Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gea\Tests\Unit\Filter;

use Gea\Filter\ChoicesFilter;
use Gea\Tests\TestCase;

/**
 * @author  Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @package Gea
 */
class ChoicesFilterTest extends TestCase
{
    public function testFilter()
    {
        $filter = new ChoicesFilter('foo', '1', 2);

        assertEquals('foo', $filter->filter('foo'));
        assertEquals('1', $filter->filter(1));
        assertEquals(2, $filter->filter('2'));
    }

    public function testFilterFromArray()
    {
        $filter = ChoicesFilter::fromArray(['foo', '1', 2]);

        assertEquals('foo', $filter->filter('foo'));
        assertEquals('1', $filter->filter(1));
        assertEquals(2, $filter->filter('2'));
    }

    /**
     * @expectedException \Gea\Exception\FilterException
     */
    public function testFilterException()
    {
        $filter = new ChoicesFilter('foo', '1', 2);
        $filter->filter('');
    }

    public function testLazy()
    {
        $filter = new ChoicesFilter([]);
        assertFalse($filter->isLazy());
    }
}
