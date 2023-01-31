<?php

namespace App\Http\Controllers;

use App\Models\Lens;
use App\Models\Site;
use Illuminate\Http\Request;

class LensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Site $site)
    {
        return view('lenses.index', [
            'lenses' => $site->getLenses(),
            'active_nav' => 'lenses',
            'meta' => [
                'title' => 'Lenses'
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lenses.create', [
            'active_nav' => 'profile',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lens  $lens
     * @return \Illuminate\Http\Response
     */
    public function show(Lens $lens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lens  $lens
     * @return \Illuminate\Http\Response
     */
    public function edit(Lens $lens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lens  $lens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lens $lens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lens  $lens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lens $lens)
    {
        //
    }
}
