<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'tempat_wisatas_images';

    protected $fillable = [
        'image',
        'tempat_wisata_id',
    ];

    public function tempatWisata(){
        return $this->belongsTo(TempatWisata::class);
    }
}
