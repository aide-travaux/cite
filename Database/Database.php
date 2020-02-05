<?php

namespace AideTravaux\CITE\Database;

abstract class Database
{
    /**
     * @property array
     */
    const DB = [
        \AideTravaux\CITE\Database\ENV\ENV01::class,
        \AideTravaux\CITE\Database\ENV\ENV02::class,
        \AideTravaux\CITE\Database\ENV\ENV03::class,
        \AideTravaux\CITE\Database\ENV\ENV04::class,
        \AideTravaux\CITE\Database\ENV\ENV05::class,
        \AideTravaux\CITE\Database\ENV\ENV06::class,
        \AideTravaux\CITE\Database\SE\SE01::class,
        \AideTravaux\CITE\Database\SE\SE02::class,
        \AideTravaux\CITE\Database\SE\SE03::class,
        \AideTravaux\CITE\Database\SE\SE04::class,
        \AideTravaux\CITE\Database\TH\TH01::class,
        \AideTravaux\CITE\Database\TH\TH02::class,
        \AideTravaux\CITE\Database\TH\TH03::class,
        \AideTravaux\CITE\Database\TH\TH04::class,
        \AideTravaux\CITE\Database\TH\TH05::class,
        \AideTravaux\CITE\Database\TH\TH06::class,
        \AideTravaux\CITE\Database\TH\TH07::class,
        \AideTravaux\CITE\Database\TH\TH08::class,
        \AideTravaux\CITE\Database\TH\TH09::class,
        \AideTravaux\CITE\Database\TH\TH10::class,
        \AideTravaux\CITE\Database\TH\TH11::class,
        \AideTravaux\CITE\Database\TH\TH12::class,
        \AideTravaux\CITE\Database\TH\TH13::class
    ];
}
