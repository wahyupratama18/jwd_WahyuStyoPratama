<?php

namespace App\Actions\CSV;

use Closure;

/**
 * Handle data dari csv untuk dashboard
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class ToCollection
{
    public function handle(object $passed, Closure $next): object
    {
        $passed->records = collect([]);

        foreach ($passed->file as $record) {
            $this->collected($passed, $record);
        }

        return $next($passed);
    }

    public function collected(object &$passed, string $record): void
    {
        if (empty($record)) {
            return;
        }

        $array = str_getcsv($record);

        $passed->records->push((object) [
            'name' => $array[0],
            'age' => $array[1],
        ]);
    }
}
