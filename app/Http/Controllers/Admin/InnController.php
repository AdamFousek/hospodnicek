<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inn\Inn;
use App\Queries\Inn\InnByUserId;
use App\Queries\Inn\InnByUserIdQuery;
use App\Queries\Inn\InnSearch;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class InnController extends Controller
{
    public function __construct(
        private readonly InnByUserIdQuery $innByUserIdQuery,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $user = $this->getUser();

        $this->authorize('viewAny', [Inn::class]);

        $inns = $this->innByUserIdQuery->handle(new InnByUserId(
            userId: $user->id,
        ));

        return Inertia::render('Admin/Inn/Index', [
            'inns' => $inns->items(),
            'paginate' => $inns,
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
    public function store(Request $request)
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
    public function update(Request $request, Inn $inn)
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
