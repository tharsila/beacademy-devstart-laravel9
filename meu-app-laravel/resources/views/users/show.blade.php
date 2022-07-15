@extends('template.users')
@section('title', $title)
@section('content')
  <h1>Usuário - {{$user->name}}</h1>
  <table class="table table-hover">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data de Cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{$user->email }}</td>
        <td>{{date('d/m/Y - H:i', strtotime($user->created_at))}}</td>
        <td>
          <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning">Editar</a>
          <form action="{{route('users.destroy', $user->id)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
@endsection