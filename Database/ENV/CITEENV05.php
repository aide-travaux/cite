<?php

namespace AideTravaux\CITE\Database\ENV;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Database\DBInterface;
use AideTravaux\CITE\Database\DBTrait;
use AideTravaux\CITE\Model\DataInterface;

abstract class CITEENV05 implements DBInterface
{
    use DBTrait;
    
    /**
     * @property
     */
    const NOM = 'Isolation thermique des parois vitrées en remplacement de parois en simple vitrage';

    /**
     * @property
     */
    const CODE = 'CITE-ENV-05';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model) * $model->getNombreEquipement();
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
                    return 40;
                case Entries::TYPE_PARTIES['type_partie_2']:
                    return 0;
                default:
                    return 0;
            }
        }
        return 0;
    }

}
