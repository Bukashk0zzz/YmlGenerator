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
use Bukashk0zzz\YmlGenerator\Model\ShopInfo;
use Bukashk0zzz\YmlGenerator\Settings;

/**
 * Generator test
 */
class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \RuntimeException
     */
    public function testExceptionForIncompatibleAnnotations()
    {
        (new Generator((new Settings())->setOutputFile('')))
            ->generate(new ShopInfo(), [], [], [])
        ;
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIfManyDestinationUsed()
    {
        $settings = (new Settings())
            ->setOutputFile('')
            ->setReturnResultYMLString(true)
        ;

        (new Generator($settings))
            ->generate(new ShopInfo(), [], [], [])
        ;
    }

    /**
     * Test equal returned value and printed
     */
    public function testGenerationEchoValueEqualsReturnValue()
    {
        $settings = (new Settings())
            ->setReturnResultYMLString(true)
        ;
        $value = (new Generator($settings))
            ->generate(new ShopInfo(), [], [], [], []);

        \ob_start();
        (new Generator(new Settings()))
            ->generate(new ShopInfo(), [], [], [], []);
        $value2 = \ob_get_clean();

        $this->assertEquals($value, $value2);
    }
}
