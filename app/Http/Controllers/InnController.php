<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInnRequest;
use App\Http\Requests\UpdateInnRequest;
use App\Models\Inn\Inn;

class InnController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInnRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inn $inn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inn $inn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInnRequest $request, Inn $inn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inn $inn)
    {
        //
    }
}