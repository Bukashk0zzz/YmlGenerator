<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Tests;

use Bukashk0zzz\YmlGenerator\Generator;
use Bukashk0zzz\YmlGenerator\Settings;
use Bukashk0zzz\YmlGenerator\Model\ShopInfo;

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
