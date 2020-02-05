<?php

namespace AideTravaux\CITE\Database;

use AideTravaux\CITE\Model\DataInterface;

/**
 * @see https://www.legifrance.gouv.fr/affichCodeArticle.do;jsessionid=50973E3EE892093E5CB41E6794EEE5B9
 * .tplgfr28s_2?idArticle=LEGIARTI000037099580&cidTexte=LEGITEXT000006069577&categorieLien=id&dateTexte=20181231
 */
interface DBInterface
{
    /**
     * Retourne le montant de l'aide financière
     * @param DataInterface
     * @return float
     */
    public static function getMontant(DataInterface $model): float;

    /**
     * Retourne le montant forfaitaire de l'aide financière
     * @param DataInterface
     * @return int
     */
    public static function getMontantForfaitaire(DataInterface $model): int;

    /**
     * @param DataInterface
     * @return array
     */
    public static function toArray(DataInterface $model): array;
}
