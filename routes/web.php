<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KorisnikController;

Route::get("/", function(){
    return redirect("prijava");
});

Route::get("/registracija", [KorisnikController::class, "registracija"]);

Route::post("/registracija", [KorisnikController::class, "spremiRegistraciju"]);

//ovaj ->name("login") je middleware koji ce dozvoliti stvari samo coviku koji je logiran 
//ako taj neko nije logiran, ovo je laravelu znak da ga takve redirecta ode
//ti middlewarei su u bootstrap/app.php 
//u biti ode samo assignamo alias jer Laravel vec ocekuje rutu s nazivom login kada nekog neprijavljenog triba preusmjeriti na prijavu
//ako necemo dat alias mozemo i prckat po middlewareu sto se apsolutno ne preporuca  
Route::get("/prijava", [KorisnikController::class, "prijava"])->name('login');

Route::post("/prijava", [KorisnikController::class, "provjeriPrijavu"]);

//Stitimo rutu: ovo moze vidit samo neko ko je prijavljen 
//Kad bi neprijavljeni korisnik upisa ovaj path u url, laravel mu ne bi prikaza stranicu 
Route::get("/profil", [KorisnikController::class, "profil"])->middleware('auth');

Route::post('/odjava', [KorisnikController::class, 'odjava'])->middleware('auth');

