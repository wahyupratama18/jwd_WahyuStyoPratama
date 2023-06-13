<?php

namespace App\Http\Controllers;

use App\Actions\Calculation\POW;
use App\Actions\CSV\OpenFile;
use App\Actions\CSV\SaveRecord;
use App\Http\Requests\StorePOWRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;
use Illuminate\View\View;

/**
 * Controller menghitung power of numbers (perpangkatan)
 *
 * @author Wahyu Styo Pratama
 *
 * @version 1.0
 */
class PowerOfNumberController extends Controller
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
        return view('pow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePOWRequest $request): RedirectResponse
    {
        Pipeline::send((object) [
            'request' => $request,
            'mode' => 'a',
        ])->through([
            POW::class,
            OpenFile::class,
            SaveRecord::class,
        ])->thenReturn();

        return redirect()->route('dashboard')->with('success', 'Perpangkatan calculated successfully!');
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
