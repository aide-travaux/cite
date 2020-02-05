# Crédit d'impôt transition énergétique

## Introduction

La classe CITE retourne toutes les informations relatives au crédit d'impôt transition énergétique

## Constantes

**CITE::NOM**
Le nom de l'aide financière

**CITE::DESCRIPTION**
Une description de l'aide financière

**CITE::DELAI**
Délai de versement de l'aide financière

**CITE::DISTRIBUTEUR**
Distributeur de l'aide financière

**CITE::REFERENCES**
Références légales ou institutionnelles de l'aide financière

**CITE::CONDITIONS**
Conditions d'accès de l'aide financière

## Méthodes

```
CITE::get(DataInterface $model): ?float;
```
Retourne le montant calculé de l'aide financière sur la base des informations transmises

```
CITE::getBareme(DataInterface $model): ?array;
```
Retourne les barêmes en vigueur pour l'ouvrage transmis

```
CITE::getPlafond(): int;
```
Retourne le plafond de l'aide financière

```
CITE::getPlafondRessources(): float;
```
Retourne le plafond de ressources pour bénéficier de l'aide financière

```
CITE::getPlancherRessources(): float;
```
Retourne le plancher de ressources pour bénéficier de l'aide financière

```
CITE::resolveConditions(ConditionInterface $model): array;
```
Retourne les conditions d'accès à l'aide et, pour chacune, si la condition est satisfaite sur la base des 
informations transmises

```
CITE::isEligible(ConditionInterface $model): bool;
```
Retourne l'éligibilité du projet à l'aide financière sur la base des informations transmises

## Exemples

```
<?php

use AideTravaux\CITE\Model\ConditionInterface;
use AideTravaux\CITE\Model\DataInterface;
use AideTravaux\CITE\CITE;

class Data implements ConditionInterface, DataInterface
{
    public function getCiteCodeTravaux(): string
    {
        return 'CITE-ENV-01';
    }

    public function getCodeRegion(): string
    {
        return '11';
    }

    public function getCompositionMenage(): int
    {
        return (int) 1;
    }

    public function getRessourcesMenage(): float
    {
        return (float) 27000;
    }

    public function getQuotientFamilial(): float
    {
        return (float) 1;
    }

    public function getSituationFamiliale(): string
    {
        return 'Marié ou pacsé';
    }

    public function getNombrePersonnesACharge(): float
    {
        return (float) 1;
    }

    public function getTypePartie(): string
    {
        return 'Partie privative';
    }

    public function getSurfaceIsolant(): float
    {
        return (float) 100;
    }

    public function getSurfaceHabitable(): float
    {
        return (float) 1;
    }

    public function getSurfaceProtegee(): float
    {
        return (float) 1;
    }

    public function getQuotePart(): float
    {
        return (float) 1;
    }

    public function getNombreLogements(): int
    {
        return (int) 1;
    }

    public function getNombreEquipement(): int
    {
        return (int) 1;
    }

    public function getStatutOccupantLogement(): string
    {
        return 'Propriétaire occupant';
    }

    public function getTypeOccupationLogement(): string
    {
        return 'Résidence principale';
    }

    public function getAgeLogement(): int
    {
        return 30;
    }
}

$data = new Data();

CITE::get($data);
CITE::resolveConditions($data);

```

## Base de données

| Code  | Travaux |
| ----- | ------- |
| CITE-ENV-01 | Isolation thermique des murs par l'extérieur |
| CITE-ENV-02 | Isolation thermique des murs par l'intérieur |
| CITE-ENV-03 | Isolation des rampants de toiture ou des plafonds de combles |
| CITE-ENV-04 | Isolation thermique des toitures terrasses |
| CITE-ENV-05 | Isolation thermique des parois vitrées en remplacement de parois en simple vitrage |
| CITE-ENV-06 | Protection des parois vitrées ou opaques contre les rayonnements solaires (uniquement pour l'Outre-mer) |
| CITE-SE-01 | Rénovation globale (maison individuelle uniquement) |
| CITE-SE-02 | Dépose de cuve à fioul |
| CITE-SE-03 | Audit énergétique |
| CITE-SE-04 | Système de charge pour véhicule électrique |
| CITE-TH-01 | Chaudières à alimentation automatique fonctionnant au bois ou autres biomasses |
| CITE-TH-02 | Chaudières à alimentation manuelle fonctionnant au bois ou autres biomasse |
| CITE-TH-03 | Systèmes solaires combinés |
| CITE-TH-04 | Chauffe-eau thermodynamique |
| CITE-TH-05 | Chauffe-eaux solaires individuels |
| CITE-TH-06 | Chauffe-eau solaire collectif |
| CITE-TH-07 | Poêles à granulés et cuisinières à granulés |
| CITE-TH-08 | Poêles à bûches et cuisinières à bûches |
| CITE-TH-09 | Partie thermique d'un équipement PVT eau (système hybride photovoltaïque et thermique) |
| CITE-TH-10 | Pompes à chaleur géothermiques |
| CITE-TH-11 | Pompes à chaleur air/ eau |
| CITE-TH-12 | Raccordement à un réseau de chaleur et/ou de froid |
| CITE-TH-13 | Ventilation mécanique contrôlée à double flux |

## Sources

- [Article 200 quater du Code général des impôts](https://www.legifrance.gouv.fr/affichCodeArticle.do;jsessionid=3E70A548BE4A0BD420B6FC3168EAD2AD.tplgfr28s_2?idArticle=LEGIARTI000041464488&cidTexte=LEGITEXT000006069577&categorieLien=id&dateTexte=)
