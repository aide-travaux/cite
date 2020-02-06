<?php

namespace AideTravaux\CITE\Model;

interface ConditionInterface
{
    public function getCiteCodeTravaux(): string;

    public function getCodeRegion(): string;

    public function getCompositionMenage(): int;

    public function getRessourcesMenage(): float;

    public function getQuotientFamilial(): float;

    public function getStatutOccupantLogement(): string;

    public function getTypeOccupationLogement(): string;

    public function getAgeLogement(): int;

}
