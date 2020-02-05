<?php

namespace AideTravaux\CITE\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\Anah\Categorie\AnahCategorie;
use AideTravaux\CITE\Utils\Helper;

class HelperTest extends TestCase
{
    public function testGetPlafondRessources()
    {
        $this->assertTrue(\is_float(Helper::getPlafondRessources(5.5)));

        $this->assertEquals(Helper::getPlafondRessources(1), 27706);
        $this->assertEquals(Helper::getPlafondRessources(1.25), 31810.5);
        $this->assertEquals(Helper::getPlafondRessources(2), 44124);
        $this->assertEquals(Helper::getPlafondRessources(3), 44124);
        $this->assertEquals(Helper::getPlafondRessources(3.25), 47202.5);
    }

    public function testGetPlancherRessources()
    {
        $this->assertTrue(\is_float(Helper::getPlancherRessources(2, '11')));
    }

}
