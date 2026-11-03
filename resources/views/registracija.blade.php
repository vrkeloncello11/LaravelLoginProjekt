<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registracija korisnika</h1>

    <form action="/registracija" method="post">
        @csrf 
        <label>Ime i prezime:</label>
        <input type="text" name="name" value="{{old('name')}}">
        <br>
        <label>eMail:</label>
        <input type="text" name="email" value="{{old('email')}}">
        <br>
        <label>Lozinka:</label>
        <input type="password" name="password" required>
        <br>
        <label>Ponovljena lozinka:</label>
        <input type="password" name="password_confirmation" required>
        <br>
        <button type="submit">Registriraj me!</button>
    </form>

    <p>Imate racun? <a href="/prijava">Prijavite se</a></p>
</body>
</html>