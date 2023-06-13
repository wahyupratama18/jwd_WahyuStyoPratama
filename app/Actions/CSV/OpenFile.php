<?php

namespace App\Actions\CSV;

use Closure;
use Illuminate\Support\Facades\Storage;
use SplFileObject;

/**
 * Aksi membuka / membuat file csv
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class OpenFile
{
    // File name
    protected const FILENAME = 'file.csv';

    /**
     * Open or create our csv file.
     */
    public function handle(object $passed, Closure $next): object
    {
        $passed->file = $passed->mode === 'a' || Storage::exists(self::FILENAME)
        ? new SplFileObject(Storage::path(self::FILENAME), $passed->mode)
        : [];

        return $next($passed);
    }
}
