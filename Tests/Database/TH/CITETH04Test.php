<?php

namespace AideTravaux\CITE\Tests\Database\TH;

use PHPUnit\Framework\TestCase;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\TH\CITETH04;
use AideTravaux\CITE\Model\DataInterface;

class CITETH04Test extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function testGetMontantForfaitaire($model, $expect)
    {
        $stub = $this->getModel();

        foreach ($model as $method => $value) {
            $stub->method($method)->willReturn($value);
        }

        $this->assertTrue(\is_int(CITETH04::getMontantForfaitaire($stub)));
        $this->assertEquals(CITETH04::getMontantForfaitaire($stub), $expect);
    }

    private function getModel()
    {
        $stub = $this->createMock(DataInterface::class);
        $stub->method('getCodeRegion')->willReturn('11');
        $stub->method('getCompositionMenage')->willReturn((int) 1);
        $stub->method('getQuotientFamilial')->willReturn((float) 1);

        return $stub;
    }

    public function modelProvider()
    {
        return [
            [ 
                'model' => [
                    'getRessourcesMenage' => (float) 0,
                    'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
                ], 0
            ], [ 
                'model' => [
                    'getRessourcesMenage' => (float) 0,
                    'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
                ], 0
            ],[ 
                'model' => [
                    'getRessourcesMenage' => (float) 26000,
                    'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
                ], 400
            ], [ 
                'model' => [
                    'getRessourcesMenage' => (float) 26000,
                    'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
                ], 150
            ], [ 
                'model' => [
                    'getRessourcesMenage' => (float) 100000,
                    'getTypePartie' => Entries::TYPE_PARTIES['type_partie_1']
                ], 0
            ], [ 
                'model' => [
                    'getRessourcesMenage' => (float) 100000,
                    'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
                ], 0
            ], [ 
                'model' => [
                    'getRessourcesMenage' => (float) 0,
                    'getTypePartie' => ''
                ], 0
            ]
        ];
    }
}
