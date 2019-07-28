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

    /**
     * Test not empty result for case with false echoOutput param
     */
    public function testGenerationReturnNotEmptyStringValue()
    {
        $value = (new Generator(new Settings()))
            ->generate(new ShopInfo(), [], [], [], [], false);
        $this->assertNotEmpty($value, 'Return empty value');
        $this->assertInternalType('string', $value, 'Returned value is not string');
    }

    /**
     * Test equal returned value and printed
     */
    public function testGenerationEchoValueEqualsReturnValue()
    {
        $value = (new Generator(new Settings()))
            ->generate(new ShopInfo(), [], [], [], [], false);

        ob_start();
        (new Generator(new Settings()))
            ->generate(new ShopInfo(), [], [], [], []);
        $value2 = ob_get_contents();
        ob_end_clean();

        $this->assertEquals($value, $value2);
    }
}
