<?php

namespace AideTravaux\CITE\Model;

interface ConditionInterface
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
     * Retourne le statut des occupants du logement
     * @return string
     */
    public function getStatutOccupantLogement(): string;

    /**
     * Retourne le type d'occupation du logement
     * @return string
     */
    public function getTypeOccupationLogement(): string;

    /**
     * Retourne l'âge du logement
     * @return int
     */
    public function getAgeLogement(): int;

}
