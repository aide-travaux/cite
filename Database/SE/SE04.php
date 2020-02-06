<?php

namespace AideTravaux\CITE\Database\SE;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DatabaseInterface;
use AideTravaux\CITE\Database\DatabaseTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class SE04 implements DatabaseInterface
{
    use DatabaseTrait;
    
    /**
     * @property
     */
    const NOM = 'Système de charge pour véhicule électrique';

    /**
     * @property
     */
    const CODE = 'CITE-SE-04';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model);
    }

    /**
     * @inheritdoc
     */
    public static function getMontantForfaitaire(DataInterface $model): int
    {
        return 300;
    }

}
