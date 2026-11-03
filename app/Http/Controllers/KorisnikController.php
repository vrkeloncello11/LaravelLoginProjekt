<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class KorisnikController extends Controller
{
    public function registracija() {
        return view("registracija");
    }

    public function spremiRegistraciju(Request $request) {

        //Laravel daje mogucnost ovakve kontrole
        $podaci=$request->validate([

            //ime je u bazi varchar(255) pa sada odma provjerimo jel iz HTMLa doslo nesto od iljadu znakova 
            'name'=>'required|string|max:255',

            //provjeri jel required, jel formata emaila, jel se vec pojavilo igdi u bazi u tableu users pod poljem email
            'email'=>'required|email|unique:users,email',

            //confirmed moramo jos definirat na bladeu al provjeravat ce jel se podudara s ponovljenom lozinkom 
            'password'=>'required|min:8|confirmed',
        ]);

        //ovo je insert ali u eloquentu, to je taj ORM
        User::create([
            'name'=>$podaci['name'],
            'email'=>$podaci['email'],
            'password'=>Hash::make($podaci['password']),
            ]);

        return redirect('/prijava');
    }

    public function prijava() {
        return view("prijava");
    }

    public function provjeriPrijavu(Request $request) {
         $podaci=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
         ]);

         //Laravel buil-in autentifikacija, ovo je bread and butter laravela 
         if (Auth::attempt($podaci)) {
            $request->session()->regenerate();
            return redirect('/profil');
         }
         //ako if vrati false, ovaj back vraca jednu stranicu nazad
         //to je takoder Laravel built in
         return back()->withErrors([
            'email'=>'Pogresan email ili lozinka'
         ]);
    }

    public function profil() {
        return view("profil");
    }

    public function odjava(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/prijava");
    }



}
