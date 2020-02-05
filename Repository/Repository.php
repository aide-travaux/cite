<?php

namespace AideTravaux\CITE\Repository;

use AideTravaux\CITE\Database\Database;

abstract class Repository extends Database
{
    /**
     * Retourne la classe correspondante au code en paramètre
     * @param string
     * @return string|null
     */
    public static function getOneOrNull(string $code): ?string
    {
        $result = array_filter(self::DB, function($class) use ($code) {
            return $code === $class::CODE;
        });

        return ($result) ? current($result) : null;
    }
}
