<?php

namespace App\Actions\CSV;

use Carbon\Carbon;
use Closure;

/**
 * Aksi melakukan parsing histori tersimpan
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class ParseHistories
{
    /**
     * Passed our saved histories to the controller
     */
    public function handle(object $passed, Closure $next): object
    {
        $passed->histories = collect([]);

        foreach ($passed->file as $record) {
            $this->collected($passed, $record);
        }

        return $next($passed);
    }

    /**
     * Collect each histories
     */
    protected function collected(object &$passed, string $record): void
    {
        if (empty($record)) {
            return;
        }

        $array = str_getcsv($record);

        $passed->histories->push(
            $this->format($array, match ($array[1]) {
                'Perpangkatan' => $this->power($array[3], $array[4]),
                'Faktorial' => $this->factorial($array[3]),
            }),
        );
    }

    /**
     * Format each histories
     */
    protected function format(array $array, object $inputs): object
    {
        return (object) [
            'date' => Carbon::parse($array[0]),
            'type' => $array[1],
            'inputs' => $inputs,
            'output' => number_format($array[2], thousands_separator: '.'),
        ];
    }

    /**
     * Format power inputs
     */
    protected function power(int $angka, int $pangkat): object
    {
        return (object) [
            'angka' => $angka,
            'pangkat' => $pangkat,
        ];
    }

    /**
     * Format factorial inputs
     */
    protected function factorial(int $angka): object
    {
        return (object) [
            'angka' => $angka,
        ];
    }
}
