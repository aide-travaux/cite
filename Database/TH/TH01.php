<?php

namespace AideTravaux\CITE\Database\TH;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DBInterface;
use AideTravaux\CITE\Database\DBTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class TH01 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Chaudières à alimentation automatique fonctionnant au bois ou autres biomasses';

    /**
     * @property
     */
    const CODE = 'CITE-TH-01';

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
                    return 4000;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 1000;
                default:
                    return 0;
            }
        }
        return 0;
    }

}
