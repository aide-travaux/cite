<?php

namespace AideTravaux\CITE\Database\TH;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DBInterface;
use AideTravaux\CITE\Database\DBTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class CITETH06 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Chauffe-eau solaire collectif';

    /**
     * @property
     */
    const CODE = 'CITE-TH-06';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model) * $model->getNombreLogements();
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
                    return 0;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 350;
                default:
                    return 0;
            }
        }
        return 0;
    }

}
