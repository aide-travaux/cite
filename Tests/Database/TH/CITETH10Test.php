<?php

namespace AideTravaux\CITE\Tests\Database\TH;

use PHPUnit\Framework\TestCase;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\TH\CITETH10;
use AideTravaux\CITE\Model\DataInterface;

class CITETH10Test extends TestCase
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

        $this->assertTrue(\is_int(CITETH10::getMontantForfaitaire($stub)));
        $this->assertEquals(CITETH10::getMontantForfaitaire($stub), $expect);
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
                ], 4000
            ], [ 
                'model' => [
                    'getRessourcesMenage' => (float) 26000,
                    'getTypePartie' => Entries::TYPE_PARTIES['type_partie_2']
                ], 1000
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
