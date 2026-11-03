<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <h1>Moj profil</h1>

    <p>Dobrodosli, {{auth()->user()->name}}</p>

    <form action="/odjava" method="post">
        @csrf
        <button type="submit">Odjavi me!</button>
    </form>
</body>
</html>