<?php

namespace App\Actions\Calculation;

use Closure;

/**
 * Aksi penyimpanan faktorial
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class Factorial extends Format
{
    /**
     * Calculate factorial
     */
    public function handle(object $passed, Closure $next): object
    {
        $this->save(
            $passed,
            'Faktorial',
            [$passed->request->angka],
            $this->calculate($passed->request->angka)
        );

        return $next($passed);
    }

    /**
     * Recursive calculation
     */
    protected function calculate(int|float $angka): int|float
    {
        if ($angka <= 1) {
            return 1;
        }

        return $angka * $this->calculate($angka - 1);
    }
}
