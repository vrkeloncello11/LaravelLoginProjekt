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

    public function store(Request $request) {
        $podaci=$request->validate([
            'naslov'=>'required|string|max:255',
            'sadrzaj'=>'required|string',
        ]);

        $request->user()->biljeske()->create($podaci);
        return redirect('/biljeske');
    }

    public function update(Request $request, Biljeska $biljeska){
        //prvo provjera:
        //      -$biljeska->user_id nam je id usera na biljesci koju zelimo vidit 
        //      -$request->user()->id nam je id usera koji je prijavljen 
        //      -403 je status requesta forbidden 
        //dakle provjerit ce jel user vlasnik biljeske koju zeli vidit, ako nije vratit ce mu forbidden
        abort_unless($biljeska->user_id==$request->user()->id, 403);

        //radimo nas istim podacima iz istog bladea, dakle identicna validacija kao u store 
        $podaci=$request->validate([
            'naslov'=>'required|string|max:255',
            'sadrzaj'=>'required|string',
        ]);

        //ako je sve kako triba, updateaj
        $biljeska->update($podaci);

        return redirect('/biljeske');
    }

    public function destroy(Request $request, Biljeska $biljeska) {
        //opet ista provjera, ne moze jedan user izbrisat biljesku od nekog drugog usera 
        abort_unless($biljeska->user_id==$request->user()->id, 403);

        //ako je user vlasnik biljeske, brisi i redirectaj nazad na sve biljeske
        $biljeska->delete();
        return redirect('biljeske');    return redirect('biljeske');
    }
}
