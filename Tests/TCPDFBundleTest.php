<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */

namespace Vladmeh\Bundle\TCPDFBundle\Tests;


use PHPUnit\Framework\TestCase;

class TCPDFBundleTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSomething()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        //$this->expectOutputString('test');
        $this->assertTrue(true);
    }
}
