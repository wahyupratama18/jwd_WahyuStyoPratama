<?php

namespace App\Http\Controllers;

use App\Actions\CSV\OpenFile;
use App\Actions\CSV\ParseHistories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;
use Illuminate\View\View;

/**
 * Controller Dashboard untuk menghitung data dan menampilkan halaman dashboard
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $histories = Pipeline::send((object) [
            'mode' => 'r',
        ])->through([
            OpenFile::class,
            ParseHistories::class,
        ])->thenReturn()->histories;

        $labels = collect([
            'Perpangkatan',
            'Faktorial',
        ]);

        return view('dashboard', [
            'histories' => $histories->sortByDesc('date'),
            'labels' => $labels,
            'series' => $labels->map(fn (string $label) => $histories->where('type', $label)->count()),
        ]);
    }
}
