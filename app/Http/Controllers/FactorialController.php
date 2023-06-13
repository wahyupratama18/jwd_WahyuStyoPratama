<?php

namespace App\Http\Controllers;

use App\Actions\Calculation\Factorial;
use App\Actions\CSV\OpenFile;
use App\Actions\CSV\SaveRecord;
use App\Http\Requests\StoreFactorialRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;
use Illuminate\View\View;

/**
 * Controller Factorial
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class FactorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('factorial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFactorialRequest $request): RedirectResponse
    {
        Pipeline::send((object) [
            'request' => $request,
            'mode' => 'a',
        ])->through([
            Factorial::class,
            OpenFile::class,
            SaveRecord::class,
        ])->thenReturn();

        return redirect()->route('dashboard')->with('success', 'Factorial calculated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
