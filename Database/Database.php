<?php

namespace AideTravaux\CITE\Database;

abstract class Database
{
    /**
     * @property array
     */
    const DB = [
        \AideTravaux\CITE\Database\ENV\CITEENV01::class,
        \AideTravaux\CITE\Database\ENV\CITEENV02::class,
        \AideTravaux\CITE\Database\ENV\CITEENV03::class,
        \AideTravaux\CITE\Database\ENV\CITEENV04::class,
        \AideTravaux\CITE\Database\ENV\CITEENV05::class,
        \AideTravaux\CITE\Database\ENV\CITEENV06::class,
        \AideTravaux\CITE\Database\SE\CITESE01::class,
        \AideTravaux\CITE\Database\SE\CITESE02::class,
        \AideTravaux\CITE\Database\SE\CITESE03::class,
        \AideTravaux\CITE\Database\SE\CITESE04::class,
        \AideTravaux\CITE\Database\TH\CITETH01::class,
        \AideTravaux\CITE\Database\TH\CITETH02::class,
        \AideTravaux\CITE\Database\TH\CITETH03::class,
        \AideTravaux\CITE\Database\TH\CITETH04::class,
        \AideTravaux\CITE\Database\TH\CITETH05::class,
        \AideTravaux\CITE\Database\TH\CITETH06::class,
        \AideTravaux\CITE\Database\TH\CITETH07::class,
        \AideTravaux\CITE\Database\TH\CITETH08::class,
        \AideTravaux\CITE\Database\TH\CITETH09::class,
        \AideTravaux\CITE\Database\TH\CITETH10::class,
        \AideTravaux\CITE\Database\TH\CITETH11::class,
        \AideTravaux\CITE\Database\TH\CITETH12::class,
        \AideTravaux\CITE\Database\TH\CITETH13::class
    ];
}
