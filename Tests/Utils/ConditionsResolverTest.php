<?php

namespace AideTravaux\CITE\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Model\ConditionInterface;
use AideTravaux\CITE\Utils\ConditionsResolver;

class ConditionsResolverTest extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function testResolveConditions($model)
    {
        $this->assertTrue(\is_array(ConditionsResolver::resolveConditions($model)));
    }

    /**
     * @depends testResolveConditions
     * @dataProvider modelProvider
     */
    public function testResolveConditionsStructure($model)
    {
        foreach (ConditionsResolver::resolveConditions($model) as $condition) {
            $this->assertArrayHasKey('condition', $condition);
            $this->assertArrayHasKey('value', $condition);
        }
    }

    /**
     * @depends testResolveConditionsStructure
     * @dataProvider modelProvider
     */
    public function testResolveConditionsType($model)
    {
        foreach (ConditionsResolver::resolveConditions($model) as $condition) {
            $this->assertTrue(\is_string($condition['condition']));
            $this->assertTrue(\is_null($condition['value']) || \is_bool($condition['value']));
        }
    }

    /**
     * @depends testResolveConditionsStructure
     * @dataProvider modelProvider
     */
    public function testIsEligible($model)
    {
        $this->assertTrue(\is_bool(ConditionsResolver::isEligible($model)));
    }

    public function modelProvider()
    {
        $stub = $this->createMock(ConditionInterface::class);

        return [ [ $stub ] ];
    }
}
