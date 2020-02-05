<?php

namespace AideTravaux\CITE;

use AideTravaux\CITE\Data\Entries;
use AideTravaux\CITE\Model\DataInterface;
use AideTravaux\CITE\Model\ConditionInterface;
use AideTravaux\CITE\Repository\Repository;
use AideTravaux\CITE\Utils\ConditionsResolver;
use AideTravaux\CITE\Utils\Helper;

abstract class CITE
{
    /**
     * @property string
     */
    const NOM = 'Crédit d\'impôt transition énergétique';

    /**
     * @property string
     */
    const DESCRIPTION = 'Le crédit d\'impôt transition énergétique permet déduire de l\'impôt sur le revenu une partie 
                        des dépenses éligibles au titre de l\'amélioration de la performance énergétique du logement';
    
    /**
     * @property string
     */
    const DELAI = 'Déduction de l\'impôt sur le revenu';
    
    /**
     * @property string
     */
    const DISTRIBUTEUR = 'Trésor public';
    
    /**
     * @property array
     */
    const REFERENCES = [
        'https://www.legifrance.gouv.fr/affichCodeArticle.do;jsessionid=3E70A548BE4A0BD420B6FC3168EAD2AD.tplgfr28s_2?
        idArticle=LEGIARTI000041464488&cidTexte=LEGITEXT000006069577&categorieLien=id&dateTexte=',
        'https://www.impots.gouv.fr/portail/particulier/le-credit-dimpot-transition-energetique'
    ];

    /**
     * @property array
     */
    const CONDITIONS = [
        'Les revenus du ménage occupant le logement sont supérieurs ou égaux aux seuils fixés',
        'Les revenus du ménage occupant le logement sont inférieurs aux seuils fixés',
        'Au moins un des membres du ménage occupant le logement en est le priopriétaire',
        'Le logement est occupé à titre de résidence principale par le ou les propriétaires 
        à la date de début des travaux et prestations',
        'Le logement ou l\'immeuble concerné est achevé depuis plus de deux ans à la date de 
        début des travaux et prestations',
        'Les travaux sont éligibles'
    ];

    /**
     * Retourne le montant de l'aide financière
     * @param DataInterface
     * @return float|null
     */
    public static function get(DataInterface $model): ?float
    {
        $base = Repository::getOneOrNull( $model->getCiteCodeTravaux() );

        return ($base) ? (float) \min(
            $base::getMontant($model),
            self::getPlafond($model)
        ) : null;
    }

    /**
     * Retourne le barême de l'aide financière
     * @param DataInterface
     * @return array|null
     */
    public static function getBareme(DataInterface $model): ?array
    {
        $base = Repository::getOneOrNull( $model->getCiteCodeTravaux() );

        return ($base) ? $base::toArray($model) : null;
    }

    /**
     * Retourne le plafond de l'aide  mentionné au 4 de l'article 200 quater du code général des impôts
     * @param DataInterface
     * @return int
     */
    public static function getPlafond(DataInterface $model): int
    {
        switch ($model->getSituationFamiliale()) {
            case Entries::SITUATIONS_CONJUGALES['situation_conjugale_1']:
                return (int) 2400 + \floor( $model->getNombrePersonnesACharge() / 0.5) * 60;
            case Entries::SITUATIONS_CONJUGALES['situation_conjugale_2']:
                return (int) 4800 + \floor( $model->getNombrePersonnesACharge() / 0.5) * 60;
            default:
                return 0;
        }
    }

    /**
     * Retourne le plafond de ressources mentionné au 1 du b du 4bis de l'article 200 quater 
     * du code général des impôts
     * @param DataInterface
     * @return float
     */
    public static function getPlafondRessources(DataInterface $model): float
    {
        return (float) Helper::getPlafondRessources( $model->getQuotientFamilial() );
    }

    /**
     * Retourne le plancher de ressources mentionné au 2 du b du 4bis de l'article 200 quater 
     * du code général des impôts
     * @param DataInterface
     * @return float
     */
    public static function getPlancherRessources(DataInterface $model): float
    {
        return (float) Helper::getPlancherRessources(
            $model->getCompositionMenage(), $model->getCodeRegion()
        );
    }

    /**
     * @see ConditionsResolver
     */
    public static function resolveConditions(ConditionInterface $model): array
    {
        return ConditionsResolver::resolveConditions($model);
    }

    /**
     * @see ConditionsResolver
     */
    public static function isEligible(ConditionInterface $model): bool
    {
        return ConditionsResolver::isEligible($model);
    }

    /**
     * @return array
     */
    public static function toArray(): array
    {
        return [
            'nom' => self::NOM,
            'description' => self::DESCRIPTION,
            'delai' => self::DELAI,
            'distributeur' => self::DISTRIBUTEUR,
            'references' => self::REFERENCES,
            'conditions' => self::CONDITIONS
        ];
    }

}
