<?php

namespace App\Http\Controllers;

use App\Models\Historys;
use Illuminate\Http\Request;

class HistorysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history = Historys::get();

        return view('history.index',compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Historys $historys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historys $historys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historys $historys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historys $historys)
    {
        //
    }
}
