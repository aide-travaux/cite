<?php

namespace AideTravaux\CITE\Database\TH;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DatabaseInterface;
use AideTravaux\CITE\Database\DatabaseTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class TH08 implements DatabaseInterface
{
    use DatabaseTrait;
    
    /**
     * @property
     */
    const NOM = 'Poêles à bûches et cuisinières à bûches';

    /**
     * @property
     */
    const CODE = 'CITE-TH-08';

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
        if ( $model->getRessourcesMenage() < CITE::getPlancherRessources($model) ) {
            return 0;
        } elseif ( $model->getRessourcesMenage() < CITE::getPlafondRessources($model) ) {
            switch ( $model->getTypePartie() ) {
                case Entries::TYPE_PARTIES['type_partie_1']:
                    return 1000;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 0;
                default:
                    return 0;
            }
        }
        return 0;
    }

}
