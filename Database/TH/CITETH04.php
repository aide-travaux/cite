<?php

namespace AideTravaux\CITE\Database\TH;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DBInterface;
use AideTravaux\CITE\Database\DBTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class CITETH04 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Chauffe-eau thermodynamique';

    /**
     * @property
     */
    const CODE = 'CITE-TH-04';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        switch ($model->getTypePartie()) {
            case Entries::TYPE_PARTIES['type_partie_1']:
                return (float) self::getMontantForfaitaire($model);
            case Entries::TYPE_PARTIES['type_partie_2']:
                return (float) self::getMontantForfaitaire($model) * $model->getNombreLogements();
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
                    return 400;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 150;
                default:
                    return 0;
            }
        }
        return 0;
    }

}