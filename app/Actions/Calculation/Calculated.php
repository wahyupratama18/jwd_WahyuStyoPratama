<?php

namespace App\Actions\Calculation;

use Closure;

/**
 * Interface dasar perhitungan
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
interface Calculated
{
    public function handle(object $passed, Closure $next): object;

    public function save(&$passed, string $calculation, array $inputs, int $output): void;
}
