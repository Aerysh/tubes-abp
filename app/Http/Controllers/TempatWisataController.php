<?php

namespace App\Http\Controllers;

use App\Models\TempatWisata;
use Illuminate\Http\Request;

class TempatWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempatWisatas = TempatWisata::all();
        return view('admin.tempatWisata.index', compact('tempatWisatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tempatWisata.create');
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
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        TempatWisata::create($request->all());

        return redirect()->route('admin.tempatWisata.index')->with('status', 'Tempat Wisata berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tempatWisata = TempatWisata::findOrFail($id);
        return view('admin.tempatWisata.show', compact('tempatWisata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        $tempatWisata = TempatWisata::findOrFail($id);

        $tempatWisata->update($request->all());
        return redirect()->route('admin.tempatWisata.index')->with('status', 'Tempat Wisata berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TempatWisata  $tempatWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tempatWisata = TempatWisata::findOrFail($id);
        $tempatWisata->delete();

        return redirect()->route('admin.tempatWisata.index')->with('status', 'Tempat Wisata berhasil dihapus');
    }
}
