<?php

namespace AideTravaux\CITE\Model;

interface DataInterface
{
    public function getCiteCodeTravaux(): string;

    public function getCodeRegion(): string;

    public function getCompositionMenage(): int;

    public function getRessourcesMenage(): float;

    public function getQuotientFamilial(): float;

    public function getSituationFamiliale(): string;

    public function getNombrePersonnesACharge(): float;

    public function getTypePartie(): string;

    public function getSurfaceIsolant(): float;

    public function getSurfaceHabitable(): float;

    public function getSurfaceProtegee(): float;

    public function getQuotePart(): float;

    public function getNombreLogements(): int;

    public function getNombreFenetres(): int;

}
