<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biljeska;

class BiljeskaController extends Controller
{
    //laravel ce index metodu roknuti odma
    public function index() {
        //auth naravno, samo logirani korisnik moze vidit svoje biljeske
        //ovaj biljeske na kraju je onaj iz modela, di je bilo belongsTo i hasMany ili sto god trece 
        $biljeske=auth()->user()->biljeske;

        //vraca view biljeske i daje tom view-u te biljeske
        return view('biljeske', ['biljeske'=>$biljeske]);

        //Laravel sve zivo odradi sam
    }
}
