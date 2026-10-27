<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Hero;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = Hero::query()->latest('created_at')->get();
        $beritaTerbaru = Berita::query()->latest('created_at')->take(3)->get();
        $videoTerbaru = Video::query()->latest('created_at')->take(5)->get();

        return view('landing.index', compact('heroes', 'beritaTerbaru', 'videoTerbaru'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
