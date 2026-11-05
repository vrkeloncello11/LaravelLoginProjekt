<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biljeske</title>
</head>
<body>
    <h1>Moje biljeske</h1>
    <p>Prijavljen korisnik: {{auth()->user()->name}}</p>

        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $greska)
                <li>{{$greska}}</li>
            @endforeach
        </ul>
        @endif

    <h3>Dodavanje biljeske</h3>
    <form action="/biljeske" method="post">
        @csrf
        <label>Naziv:</label>
        <input type="text" name="naslov" required>
        <br>

        <label>Sadrzaj:</label>
        <textarea name="sadrzaj" required></textarea>
        <br>

        <button type="submit">Dodaj biljesku</button>
    </form>

    <hr>

    <h3>Moje biljeske: </h3>
    @forelse ($biljeskeIndex as $biljeska)
        <h3>{{$biljeska->naslov}}</h3>
        <p>{{$biljeska->sadrzaj}}</p>

        <h4>Uredi biljesku</h4>
        <form action="biljeske/{{$biljeska->id}}" method="post">   
            @csrf
            @method('PUT')

            <input type="text" name="naslov" value="{{$biljeska->naslov}}" required>
            <br>
            <textarea name="sadrzaj" required>{{$biljeska->sadrzaj}}</textarea>
            <br>
            <button type="submit">Spremi izmjene</button>
        </form>

        <form action="biljeske/{{$biljeska->id}}" method="post">  
            @csrf
            @method('DELETE')
            <button type="submit">Izbrisi</button>
        </form>
        <hr>
        @empty
        <p>Jos nemate biljeski</p>

    @endforelse

    <p>Vratite se na <a href="/profil">profil</a></p>


</body>
</html>
