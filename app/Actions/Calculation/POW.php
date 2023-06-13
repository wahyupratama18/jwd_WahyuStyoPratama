<?php

namespace App\Actions\Calculation;

use Closure;

/**
 * Aksi perhitungan perpangkatan
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class POW extends Format
{
    /**
     * Calculate Perpangkatan
     */
    public function handle(object $passed, Closure $next): object
    {
        $this->save(
            $passed,
            'Perpangkatan',
            [
                $passed->request->angka,
                $passed->request->pangkat,
            ],
            $this->calculate($passed->request->angka, $passed->request->pangkat)
        );

        return $next($passed);
    }

    /**
     * Calculate Pangkat
     */
    protected function calculate(int $angka, int $pangkat): int
    {
        return pow($angka, $pangkat);
    }
}
