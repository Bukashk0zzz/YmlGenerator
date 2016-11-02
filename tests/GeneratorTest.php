<?php

/*
 * This file is part of the blainerohmerYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace blainerohmer\YmlGenerator\Tests;

use blainerohmer\YmlGenerator\Generator;
use blainerohmer\YmlGenerator\Settings;
use blainerohmer\YmlGenerator\Model\ShopInfo;

/**
 * Generator test
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test exception
     *
     * @expectedException \RuntimeException
     */
    public function testExceptionForIncompatibleAnnotations()
    {
        (new Generator((new Settings())->setOutputFile('')))
            ->generate(new ShopInfo(), [], [], [])
        ;
    }
}
