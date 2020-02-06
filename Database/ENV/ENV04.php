<?php

namespace AideTravaux\CITE\Database\ENV;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DatabaseInterface;
use AideTravaux\CITE\Database\DatabaseTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class ENV04 implements DatabaseInterface
{
    use DatabaseTrait;
    
    /**
     * @property
     */
    const NOM = 'Isolation thermique des toitures terrasses';

    /**
     * @property
     */
    const CODE = 'CITE-ENV-04';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        switch ($model->getTypePartie()) {
            case Entries::TYPE_PARTIES['type_partie_1']:
                return (float) self::getMontantForfaitaire($model) * $model->getSurfaceIsolant();
            case Entries::TYPE_PARTIES['type_partie_2']:
                return (float) 
                    self::getMontantForfaitaire($model) 
                    * $model->getSurfaceIsolant() 
                    * $model->getQuotePart()
                ;
            default:
                return (float) 0;
        }
    }

    /**
     * @inheritdoc
     */
    public static function getMontantForfaitaire(DataInterface $model): int
    {
        if ( $model->getRessourcesMenage() < CITE::getPlancherRessources($model) ) {
            return 0;
        } elseif ( $model->getRessourcesMenage() < CITE::getPlafondRessources($model) ) {
            switch ( $model->getTypePartie() ) {
                case Entries::TYPE_PARTIES['type_partie_1']:
                    return 50;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 50;
                default:
                    return 0;
            }
        } else {
            switch ( $model->getTypePartie() ) {
                case Entries::TYPE_PARTIES['type_partie_1']:
                    return 25;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 25;
                default:
                    return 0;
            }
        }
    }

}
