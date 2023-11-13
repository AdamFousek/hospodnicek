<?php

namespace App\Http\Controllers\Inn;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInnRequest;
use App\Http\Requests\UpdateInnRequest;
use App\Models\Inn\Inn;
use App\Queries\Enums\InnSort;
use App\Queries\Inn\InnSearch;
use App\Queries\Inn\InnSearchQuery;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class InnController extends Controller
{
    public function __construct(
        private readonly InnSearchQuery $searchQuery,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $search = (string)$request->get('query');
        $sort = InnSort::from((int)$request->get('sort', 0));
        $page = (int)$request->get('page', 1);

        $inns = $this->searchQuery->handle(new InnSearch(
            query: $search,
            sort: $sort,
            page: $page,
        ));

        return Inertia::render('Inn/Index', [
            'inns' => $inns->items,
            'paginate' => [
                'page' => $page,
                'total' => $inns->total,
                'limit' => InnSearch::LIMIT,
            ],
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
