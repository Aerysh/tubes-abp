<?php

namespace App\Http\Controllers;

use App\Models\TempatWisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempatWisatas = TempatWisata::with('images')->inRandomOrder()->take(3)->get();
        return view('index', compact('tempatWisatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tempatWisata = TempatWisata::with('images')->findOrFail($id);
        return view('tempatWisata.show', compact('tempatWisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function edit(TempatWisata $tempatWisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempatWisata $tempatWisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatWisata $tempatWisata)
    {
        //
    }
}
