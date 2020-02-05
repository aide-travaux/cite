<?php

namespace AideTravaux\CITE\Database;

use AideTravaux\CITE\Model\DataInterface;

trait DBTrait
{
    /**
     * @inheritdoc
     */
    public static function toArray(DataInterface $model): array
    {
        return [
            'nom' => self::NOM,
            'code' => self::CODE,
            'montant' => self::getMontant($model),
            'montant_forfaitaire' => self::getMontantForfaitaire($model)
        ];
    }
}
