<?php

namespace AideTravaux\CITE\Database\TH;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DBInterface;
use AideTravaux\CITE\Database\DBTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class CITETH03 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Systèmes solaires combinés';

    /**
     * @property
     */
    const CODE = 'CITE-TH-03';

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
                    return 3000;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 0;
                default:
                    return 0;
            }
        }
        return 0;
    }

}
