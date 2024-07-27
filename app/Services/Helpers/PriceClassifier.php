<?php

namespace App\Services\Helpers;

class PriceClassifier
{
    private const PRICE_LABELS = [
        'LOW' => 'Žema',
        'MEDIUM' => 'Vidutinė',
        'HIGH' => 'Aukšta',
        'VERY_HIGH' => 'Labai Aukšta'
    ];

    private const PRICE_RANGES = [
        'LOW' => 50000,
        'MEDIUM' => 150000,
        'HIGH' => 500000
    ];

    public function classify(float $price): string
    {
        if ($price <= self::PRICE_RANGES['LOW']) {
            return self::PRICE_LABELS['LOW'];
        } elseif ($price <= self::PRICE_RANGES['MEDIUM']) {
            return self::PRICE_LABELS['MEDIUM'];
        } elseif ($price <= self::PRICE_RANGES['HIGH']) {
            return self::PRICE_LABELS['HIGH'];
        } else {
            return self::PRICE_LABELS['VERY_HIGH'];
        }
    }
}