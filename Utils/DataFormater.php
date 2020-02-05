<?php

namespace AideTravaux\CITE\Utils;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Model\DataInterface;
use AideTravaux\CITE\Model\ConditionInterface;

abstract class DataFormater
{
    /**
     * @param mixed|null
     * @return array
     */
    public static function get($model = null): array
    {
        $array = CITE::toArray();

        if ($model instanceof DataInterface) {
            $array = \array_merge($array, [
                'montant' => CITE::get($model),
                'bareme' => CITE::getBareme($model),
                'plafond_ressources' => CITE::getPlafondRessources($model),
                'plancher_ressources' => CITE::getPlancherRessources($model),
                'plafond' => CITE::getPlafond($model)
            ]);
        }

        if ($model instanceof ConditionInterface) {
            $array = \array_merge($array, [
                'conditions' => CITE::resolveConditions($model),
                'isEligible' => CITE::isEligible($model)
            ]);
        }

        return $array;
    }
}
