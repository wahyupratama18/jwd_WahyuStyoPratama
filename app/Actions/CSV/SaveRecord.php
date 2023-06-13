<?php

namespace App\Actions\CSV;

use Closure;

/**
 * Simpan data ke file csv
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class SaveRecord
{
    /**
     * Save the record to the file.
     */
    public function handle(object $passed, Closure $next): object
    {
        $passed->file->fputcsv($passed->calculation);

        return $next($passed);
    }
}
