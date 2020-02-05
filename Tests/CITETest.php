<?php

namespace AideTravaux\CITE\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Model\DataInterface;

class CITETest extends TestCase
{
    private function getMock()
    {
        $stub = $this->createMock(DataInterface::class);
        $stub->method('getCoutTTC')->willReturn((float) 1);
        return [ [ $stub ] ];
    }

    public function testGet()
    {
        $this->assertTrue(true);
    }
}
