<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biljeska extends Model
{
    //ako smo iz migracije uklonili timestamp, dodavanjem ovog "public $timestamps=false" osiguran 
    //da se laravel ne zbrika cili kad krene popuniti updated_at i created_at 
    public $timestamps=false;

    protected $table='biljeske';

    protected $fillable=['naslov', 'sadrzaj'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
