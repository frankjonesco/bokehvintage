<?php

namespace App\Http\Controllers;

use App\Models\Lens;
use App\Models\Site;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'active_nav' => 'lenses',
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
        $request->validate([
            'brand' => ['required', 'min:3', 'max:30', Rule::exists('brands', 'name')],
            'model' => ['required', 'min:3', 'max:30', Rule::unique('lenses', 'model')],
        ]);
        

        Lens::create([
            'hex' => Str::random(11),
            'brand_id' => Brand::select('id')->where('name', $request->brand)->first()->id,
            'user_id' => auth()->user()->id,
            'model' => $request->model,
            'slug' => makeSlug($request->model)
        ]);

        return redirect('lenses')->with('message', 'Your lens was added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lens  $lens
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Lens $lens)
    {
        return view('lenses.show', [
            'lens' => $lens,
            'active_nav' => 'lenses',
            'meta' => [
                'title' => 'Lenses'
            ]
        ]);
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
