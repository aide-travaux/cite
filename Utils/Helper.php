<?php

namespace AideTravaux\CITE\Utils;

use AideTravaux\Anah\Categorie\AnahCategorie;

abstract class Helper
{
    /**
     * Retourne le plafond de ressources mentionné au 1 du b du 4bis de l'article 200 quater 
     * du code général des impôts
     * @param float
     * @return float
     */
    public static function getPlafondRessources(float $quotientFamilial): float
    {
        $ceiling = 27706;
        $ceiling += \max( \floor(\min( $quotientFamilial - 1, 1 ) / 0.25) * (8209 / 2), 0);
        $ceiling += \max( \floor( ($quotientFamilial - 3) / 0.25) * (6157 / 2), 0);

        return (float) $ceiling;
    }

    /**
     * Retourne le plancher de ressources mentionné au 2 du b du 4bis de l'article 200 quater 
     * du code général des impôts
     * @param int
     * @param string
     * @return float
     */
    public static function getPlancherRessources(int $compositionMenage, string $codeRegion): float
    {
        return (float) AnahCategorie::getPlafond( $compositionMenage, $codeRegion );
    }

}
