<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Endereços</title>
</head>
<body>
  <div class="container">
    <h1>Lista de Endereços</h1>
    <table class="table">
      <thead class ="table table-dark text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Endereço</th>
          <th scope="col">Cep</th>
          <th scope="col">Cidade</th>
          <th scope="col">País</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($addresses as $address)
          <tr>
            <th scope="row">{{$address->id}}</th>
            <td>{{$address->address}}</td>
            <td>{{$address->postal_code}}</td>
            <td>{{$address->city}}</td>
            <td>{{$address->country}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>