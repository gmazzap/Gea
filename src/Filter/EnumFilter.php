<?php
/*
 * This file is part of the Gea package.
 *
 * (c) Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gea\Filter;

use Gea\Exception\FilterException;

/**
 * @author  Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @package Gea
 */
final class EnumFilter implements FilterInterface
{
    use LazyFilterTrait;

    /**
     * @var bool
     */
    private static $lazy = false;

    /**
     * @var array
     */
    private $allowed = [];

    /**
     * @param  array                  $args
     * @return \Gea\Filter\EnumFilter
     */
    public static function fromArray(array $args)
    {
        $instance = new static();
        $instance->allowed = $args;

        return $instance;
    }

    public function __construct()
    {
        $this->allowed = func_get_args();
    }

    /**
     * @inheritdoc
     */
    public function filter($value)
    {
        if (! in_array($value, $this->allowed, true)) {
            throw new FilterException(':name value is not allowed.');
        }

        return $value;
    }
}
