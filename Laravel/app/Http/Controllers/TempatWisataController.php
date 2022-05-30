<?php

namespace App\Http\Controllers;

use App\Models\TempatWisata;
use App\Models\Kategori;
use App\Models\Image;
use File;
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
        $kategoris = Kategori::all();
        return view('admin.tempatWisata.create', compact('kategoris'));
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
            'name' => 'required|max:255',
            'description' => 'required',
            'address' => 'required',
            'categories' => 'required',
            'images' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tempatWisata = new TempatWisata;
        $tempatWisata->name = $request->name;
        $tempatWisata->description = $request->description;
        $tempatWisata->address = $request->address;
        $tempatWisata->categories = $request->categories;
        $tempatWisata->save();

        $images = $request->file('images');
        $imagesName = time() . '.' . $images->getClientOriginalExtension();
        $destination = public_path() . '/images';
        $images->move($destination, $imagesName);

        $image = new Image;
        $image->image = $imagesName;
        $image->tempat_wisata_id = $tempatWisata->id;
        $image->save();

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
        $kategoris = Kategori::all();
        return view('admin.tempatWisata.edit', compact('tempatWisata', 'kategoris'));
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
            'name' => 'required|max:255',
            'description' => 'required',
            'address' => 'required',
            'categories' => 'required',
            'images' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tempatWisata = TempatWisata::findOrFail($id);

        $tempatWisata->name = $request->name;
        $tempatWisata->description = $request->description;
        $tempatWisata->address = $request->address;
        $tempatWisata->categories = $request->categories;
        $tempatWisata->save();

        $image = Image::where('tempat_wisata_id', $id)->first();

        if($request->hasFile('images')){
            $oldImagePath = public_path() . '/images/' . $image->image;
            if(File::exists($oldImagePath)){
                File::delete($oldImagePath);
            }
            $images = $request->file('images');
            $imagesName = time() . '.' . $images->getClientOriginalExtension();
            $path = public_path() . '/images';
            $images->move($path, $imagesName);
        }else{
            $imagesName = $image->image;
        }

        $image->image = $imagesName;
        $image->tempat_wisata_id = $tempatWisata->id;
        $image->save();

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

        $image = Image::where('tempat_wisata_id', $id)->first();
        // delete file
        File::delete(public_path() . '/images/' . $image->image);
        $image->delete();

        return redirect()->route('admin.tempatWisata.index')->with('status', 'Tempat Wisata berhasil dihapus');
    }
}
