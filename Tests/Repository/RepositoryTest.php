<?php

namespace AideTravaux\CITE\Tests\Repository;

use PHPUnit\Framework\TestCase;
use AideTravaux\CITE\Repository\Repository;

class RepositoryTest extends TestCase
{
    public function testGetOneOrNull()
    {
        $this->assertTrue(\is_string(Repository::getOneOrNull('CITE-ENV-01')));
        $this->assertNull(Repository::getOneOrNull(''));
    }
}
