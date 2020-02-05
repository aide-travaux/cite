<?php

namespace AideTravaux\CITE\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Model\ConditionInterface;
use AideTravaux\CITE\Model\DataInterface;

class CITETest extends TestCase
{
    public function testGet()
    {
        $stub = $this->createMock(DataInterface::class);
        $stub->method('getCiteCodeTravaux')->willReturn('CITE-ENV-01');
        $this->assertTrue(\is_float(CITE::get($stub)));

        $stub = $this->createMock(DataInterface::class);
        $this->assertNull(CITE::get($stub));
    }

    public function testGetBareme()
    {
        $stub = $this->createMock(DataInterface::class);
        $stub->method('getCiteCodeTravaux')->willReturn('CITE-ENV-01');
        $this->assertTrue(\is_array(CITE::getBareme($stub)));

        $stub = $this->createMock(DataInterface::class);
        $this->assertNull(CITE::getBareme($stub));
    }

    public function testGetPlafond()
    {
        $stub = $this->createMock(DataInterface::class);
        $stub->method('getSituationFamiliale')->willReturn(Entries::SITUATIONS_CONJUGALES['situation_conjugale_1']);
        $stub->method('getNombrePersonnesACharge')->willReturn((float) 1);
        $this->assertEquals(CITE::getPlafond($stub), 2520);

        $stub = $this->createMock(DataInterface::class);
        $stub->method('getSituationFamiliale')->willReturn(Entries::SITUATIONS_CONJUGALES['situation_conjugale_2']);
        $stub->method('getNombrePersonnesACharge')->willReturn((float) 1);
        $this->assertEquals(CITE::getPlafond($stub), 4920);
        $stub = $this->createMock(DataInterface::class);

        $stub->method('getSituationFamiliale')->willReturn('');
        $stub->method('getNombrePersonnesACharge')->willReturn((float) 1);
        $this->assertEquals(CITE::getPlafond($stub), 0);
    }

    public function testGetPlafondRessources()
    {
        $stub = $this->createMock(DataInterface::class);
        $this->assertTrue(\is_float(CITE::getPlafondRessources($stub)));
    }

    public function testGetPlancherRessources()
    {
        $stub = $this->createMock(DataInterface::class);
        $this->assertTrue(\is_float(CITE::getPlancherRessources($stub)));
    }
    
    public function testResolveConditions()
    {
        $stub = $this->createMock(ConditionInterface::class);
        $this->assertTrue(\is_array(CITE::resolveConditions($stub)));
    }

    public function testIsEligible()
    {
        $stub = $this->createMock(ConditionInterface::class);
        $this->assertTrue(\is_bool(CITE::isEligible($stub)));
    }

    public function testToArray()
    {
        $this->assertTrue(\is_array(CITE::toArray()));
    }
}
