<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Via Cep</title>
</head>
<body>
  <form action="{{Route('viacep.index.post')}}" method='post'>
    @csrf
    <input type="text" name="cep">
    <button type="submit">Enviar</button>
  </form>
</body>
</html>