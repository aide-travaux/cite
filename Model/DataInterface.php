<?php

namespace AideTravaux\CITE\Model;

interface DataInterface
{
    /**
     * Retourne le code travaux Ma Prime Rénov
     * @return string
     */
    public function getCiteCodeTravaux(): string;

    /**
     * Retourne le code région
     * @return string
     */
    public function getCodeRegion(): string;

    /**
     * Retourne le nombre de personnes composant le ménages
     * @return int
     */
    public function getCompositionMenage(): int;

    /**
     * Retourne les ressources du ménage
     */
    public function getRessourcesMenage(): float;

    /**
     * Retourne le quotient familial du ménage
     * @return float
     */
    public function getQuotientFamilial(): float;

    /**
     * Retourne la situation familiale du demandeur
     * @return string
     */
    public function getSituationFamiliale(): string;

    /**
     * Retourne le nombre de personne à charge
     * @return float
     */
    public function getNombrePersonnesACharge(): float;

    /**
     * Retourne le type de partie (commune ou privative)
     * @return string
     */
    public function getTypePartie(): string;

    /**
     * Retourne la surface d'isolant posé
     * @return float
     */
    public function getSurfaceIsolant(): float;

    /**
     * Retourne la surface habitable du logement
     * @return float
     */
    public function getSurfaceHabitable(): float;

    /**
     * Retourne la surface de paroie protégée
     * @return float
     */
    public function getSurfaceProtegee(): float;

    /**
     * Retourne la quote-part des travaux supportée par le demandeur
     * @return float
     */
    public function getQuotePart(): float;

    /**
     * Retourne le nombre d'appartements
     * @return int
     */
    public function getNombreLogements(): int;

    /**
     * Nombre d'équipements installés
     */
    public function getNombreEquipement(): int;

}
