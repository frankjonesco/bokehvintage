<?php

namespace App\Http\Controllers;

use App\Models\s;
use App\Models\Site;
use App\Models\Brand;
use App\Models\Camera;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Site $site)
    {
        return view('cameras.index', [
            'cameras' => $site->getCameras(),
            'active_nav' => 'cameras',
            'meta' => [
                'title' => 'Cameras'
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
        return view('cameras.create', [
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
        $request->validate([
            'brand' => ['required', 'max:30', Rule::exists('brands', 'name')],
            'model' => ['required', 'max:30', Rule::unique('cameras', 'model')],
        ]);
        

        Camera::create([
            'hex' => Str::random(11),
            'brand_id' => Brand::select('id')->where('name', $request->brand)->first()->id,
            'user_id' => auth()->user()->id,
            'model' => $request->model,
            'slug' => makeSlug($request->model)
        ]);

        return redirect('cameras')->with('message', 'Your camera was added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Camera $camera)
    {
        return view('cameras.show', [
            'camera' => $camera,
            'active_nav' => 'cameras',
            'meta' => [
                'title' => $camera->brand->name.' '.$camera->model,
                'description' => truncate(strip_tags($camera->article_body), 250)
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function edit(Camera $camera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camera $camera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camera $camera)
    {
        //
    }
}
