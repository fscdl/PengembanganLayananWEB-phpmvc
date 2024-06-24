<?php

namespace App\Http\Controllers;

use App\Models\Datadiri;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Gate;



class DatadiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $datadiri = auth()->user()->datadiri;
        return view('datadiri.index', compact('datadiri'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
        ]);
    
        $request->user()->datadiri()->create($validated);
    
        return redirect()->route('datadiri.index')->with('success', 'Personal data saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Datadiri $datadiri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datadiri $datadiri): View
{
    return view('datadiri.edit', compact('datadiri'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Datadiri $datadiri): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
        ]);
    
        $datadiri->update($validated);
    
        return redirect()->route('datadiri.index')->with('success', 'Personal data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datadiri $datadiri): RedirectResponse
    {
        $datadiri->delete();
    
        return redirect()->route('datadiri.index')->with('success', 'Personal data deleted successfully.');
    }
}
