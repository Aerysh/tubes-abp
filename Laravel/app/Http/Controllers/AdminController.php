<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TempatWisata;
use App\Models\Kategori;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        // Jumlah tempat wisata
        $tempatWisataCount = TempatWisata::count();

        // Jumlah User
        $usersCount = User::count();

        // rata rata comment rating
        $commentCount = Comment::count();
        $ratingCount = Comment::sum('rating');
        $rataRating = $ratingCount / $commentCount;


        // komentar terbaru
        $comments = Comment::with('user')->orderBy('created_at', 'desc')->take(1)->get();


        return view('admin.index',  compact('tempatWisataCount', 'usersCount', 'rataRating', 'comments'));
    }
}
