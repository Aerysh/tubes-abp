<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempatWisata;
use App\Models\Comment;

class WisataController extends Controller
{
    /**
     * Display random listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function discover()
    {
        // select random 5 tempat wisata
        $wisata = TempatWisata::with('images')->inRandomOrder()->take(5)->get();

        return response()->json(
            $wisata,
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $wisata = TempatWisata::with('images')->findOrFail($id);
        $comments = Comment::with('user')->where('tempat_wisata_id', $id)->get();
        return response()->json([
            "data" => $wisata,
            "comments" => $comments
        ]);
    }
}
