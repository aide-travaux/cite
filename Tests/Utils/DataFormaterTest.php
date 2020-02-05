<?php

namespace AideTravaux\CITE\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\CITE\Model\DataInterface;
use AideTravaux\CITE\Model\ConditionInterface;
use AideTravaux\CITE\Utils\DataFormater;

class DataFormaterTest extends TestCase
{
    public function testGet()
    {
        $this->assertTrue(\is_array(DataFormater::get()));
    }
}
