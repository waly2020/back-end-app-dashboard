<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <form action="{{ route('auth.doLogin') }}" method="post">
      @csrf
      <input type="email" name="email" id="mail" placeholder="email"><br>
      @error("email")
      {{$message}}
      @enderror
      <input type="password" name="password" id="password" placeholder="mot de passe"><br>
      @error("password")
      {{$message}}
      @enderror
      <button type="submit">Envoyé</button>
  </form>
</body>
</html>
