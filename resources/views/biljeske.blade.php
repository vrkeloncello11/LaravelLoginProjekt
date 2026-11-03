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
</body>
</html>