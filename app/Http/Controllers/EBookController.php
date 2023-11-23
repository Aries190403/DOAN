<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use App\Http\Requests\StoreEBookRequest;
use App\Http\Requests\UpdateEBookRequest;

class EBookController extends Controller
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
    public function store(StoreEBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EBook $eBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EBook $eBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEBookRequest $request, EBook $eBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EBook $eBook)
    {
        //
    }
}
