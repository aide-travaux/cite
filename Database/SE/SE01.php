<?php

namespace AideTravaux\CITE\Database\SE;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DatabaseInterface;
use AideTravaux\CITE\Database\DatabaseTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class SE01 implements DatabaseInterface
{
    use DatabaseTrait;
    
    /**
     * @property
     */
    const NOM = 'Rénovation globale (maison individuelle uniquement)';

    /**
     * @property
     */
    const CODE = 'CITE-SE-01';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model) * $model->getSurfaceHabitable();
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
                    return 150;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 0;
                default:
                    return 0;
            }
        }
        return 0;
    }

}
