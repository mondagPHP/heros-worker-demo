<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace Test\Unit;

use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    public function testAll()
    {
        $this->assertTrue(all([]));
        $this->assertTrue(all([1, 2, 3, 4, 5, 6]));
        $this->assertTrue(all([-1, -2, -3, -4, -5, -6]));
        $this->assertFalse(all([0, 1, -1 , '1']));
        $this->assertFalse(all(['', 1, -1 , '1']));
        $this->assertFalse(all([null, 1, -1 , '1']));
        $this->assertFalse(all([false, 1, -1 , '1']));
    }

    public function testAny()
    {
        $this->assertFalse(any([]));
        $this->assertFalse(any([0, '', false, null]));
        $this->assertTrue(any([0, '', false, 1]));
        $this->assertTrue(any([0, '1', false, null]));
        $this->assertTrue(any([0, '', true, null]));
        $this->assertTrue(any([1, '', false, null]));
    }
}
