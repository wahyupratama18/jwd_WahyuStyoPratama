<?php

namespace App\Actions\Calculation;

/**
 * Abstract class format penyimpanan
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
abstract class Format implements Calculated
{
    public function save(&$passed, string $calculation, array $inputs, int|float $output): void
    {
        $passed->calculation = array_merge([now(), $calculation, $output], $inputs);
    }
}
