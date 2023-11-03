<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInnRequest;
use App\Http\Requests\UpdateInnRequest;
use App\Models\Inn\Inn;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class InnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $search = (string)$request->get('query');

        $innsPagination = Inn::search($search)->query(function ($builder) {
            $builder->with(['address', 'contact', 'todayHours']);
        })->paginate(21);

        return Inertia::render('Inn/Index', [
            'inns' => $innsPagination->items(),
            'paginate' => $innsPagination,
            'search' => $search,
        ]);
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
    public function show(Inn $inn): Response
    {
        return Inertia::render('Inn/Show', [
            'inn' => $inn,
        ]);
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
