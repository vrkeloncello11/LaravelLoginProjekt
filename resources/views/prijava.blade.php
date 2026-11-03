<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
</head>
<body>
    <h1>Prijava korisnika</h1>

    @if($errors->any())
    <p>{{$errors->first()}}</p>
    @endif

    <form action="/prijava" method="post">
        @csrf 
        <label>eMail:</label>
        <input type="text" name="email" value="{{old('email')}}">
        <br>
        <label>Lozinka:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Prijavi me!</button>
    </form>

    <p>Nemate racun? <a href="/registracija">Registriraj se!</a></p>

</body>
</html>