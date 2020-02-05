<?php

namespace AideTravaux\CITE\Database\ENV;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DBInterface;
use AideTravaux\CITE\Database\DBTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class CITEENV06 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Protection des parois vitrées ou opaques contre les rayonnements solaires (uniquement pour l\'Outre-mer)';

    /**
     * @property
     */
    const CODE = 'CITE-ENV-06';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        switch ($model->getTypePartie()) {
            case Entries::TYPE_PARTIES['type_partie_1']:
                return (float) self::getMontantForfaitaire($model) * $model->getSurfaceProtegee();
            case Entries::TYPE_PARTIES['type_partie_2']:
                return (float) 
                    self::getMontantForfaitaire($model) 
                    * $model->getSurfaceProtegee() 
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
                    return 15;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 15;
                default:
                    return 0;
            }
        }
        return 0;
    }

}
