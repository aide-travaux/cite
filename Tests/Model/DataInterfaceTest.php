<?php

namespace AideTravaux\CITE\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\Core\CoreInterface;
use AideTravaux\CITE\Model\DataInterface;

class DataInterfaceTest extends TestCase
{
    /**
     * @dataProvider methodsProvider
     */
    public function testMethodsExists($reflectionMethod)
    {
        $reflectionCoreInterface = new \ReflectionClass(CoreInterface::class);

        $this->assertTrue(\in_array($reflectionMethod->getName(), array_map(function($row) {
            return $row->getName();
        }, $reflectionCoreInterface->getMethods())));
    }

    /**
     * @dataProvider methodsProvider
     */
    public function testTypeReturn($reflectionMethod)
    {
        $reflectionCoreInterface = new \ReflectionClass(CoreInterface::class);
        
        $this->assertEquals(
            $reflectionCoreInterface->getMethod( $reflectionMethod->getName() )->getReturnType()->getName(),
            $reflectionMethod->getReturnType()->getName()
        );
    }

    public function methodsProvider()
    {
        $reflectionInterface = new \ReflectionClass(DataInterface::class);

        return \array_map(function($method) {
            return [ $method ];
        }, $reflectionInterface->getMethods());
    }
}
