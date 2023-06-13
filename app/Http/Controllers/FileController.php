<?php

namespace App\Http\Controllers;

use App\Actions\CSV\OpenFile;
use App\Actions\CSV\SaveRecord;
use App\Actions\CSV\ToCollection;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;
use Illuminate\View\View;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $file = Pipeline::send((object) [
            'mode' => 'r',
        ])->through([
            OpenFile::class,
            ToCollection::class,
        ])->thenReturn();

        return view('files.index', [
            'records' => $file->records,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request): RedirectResponse
    {
        Pipeline::send((object) [
            'mode' => 'a',
            'request' => $request,
        ])->through([
            OpenFile::class,
            SaveRecord::class,
        ])->thenReturn();

        return redirect()->route('files.index')->with('success', 'File uploaded successfully!');
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
