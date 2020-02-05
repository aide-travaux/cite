<?php

namespace AideTravaux\CITE\Utils;

use AideTravaux\CITE\CITE;
use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Model\ConditionInterface;
use AideTravaux\CITE\Repository\Repository;

abstract class ConditionsResolver
{
    /**
     * Retourne les conditions d'accès satisfaites ou non
     * @param ConditionInterface
     * @return array
     */
    public static function resolveConditions(ConditionInterface $model): array
    {
        $conditions = CITE::CONDITIONS;

        return [
            [
                'condition' => $conditions[0],
                'value' => $model->getCiteCodeTravaux() === 'CITE-SE-04' 
                            || $model->getRessourcesMenage() >= Helper::getPlancherRessources(
                                $model->getCompositionMenage(), $model->getCodeRegion()
                            )
            ], [
                'condition' => $conditions[1],
                'value' => \in_array($model->getCiteCodeTravaux(), ['CITE-ENV-01', 'CITE-ENV-02', 'CITE-ENV-03', 'CITE-ENV-04']) 
                            || $model->getRessourcesMenage() < Helper::getPlafondRessources($model->getQuotientFamilial())
            ], [
                'condition' => $conditions[2],
                'value' => $model->getStatutOccupantLogement() 
                            === Entries::STATUTS_OCCUPANT_LOGEMENT['statut_occupant_logement_1']
            ], [
                'condition' => $conditions[3],
                'value' => $model->getTypeOccupationLogement() 
                            === Entries::TYPES_OCCUPATION_LOGEMENT['type_occupation_logement_1']
            ], [
                'condition' => $conditions[4],
                'value' => $model->getAgeLogement() > 2
            ], [
                'condition' => $conditions[5],
                'value' => !empty( Repository::getOneOrNull($model->getCITECodeTravaux()) )
            ]
        ];
    }

    /**
     * Retourne l'éligibilité à l'aide financière
     * @param ConditionInterface
     * @return bool
     */
    public static function isEligible(ConditionInterface $model): bool
    {
        foreach (self::resolveConditions($model) as $condition) {
            if ($condition['value'] === false)  {
                return false;
            }
        }
        return true;
    }
}
