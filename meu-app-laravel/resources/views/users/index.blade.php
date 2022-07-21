@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('content')
  <h1>Listagem de Usuários</h1>
 
  <div class="container">
    <div class="row">
      <div class="col-sm mt-2 mb-5">
        <a href="{{route('users.create')}}" class="btn btn-outline-dark mb-3">Novo usuário</a>
      </div>
      <div class="col-sm mt-2 mb-5">
        <form action="{{route('users.index')}}" method="get">
          <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Pesquisar" name="search" />
            <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <table class="table table-hover">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col">Foto</th>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Postagens</th>
        <th scope="col">Data de Cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @foreach($users as $user)
        <tr>
          @if($user->image)
            <th><img src="{{asset('storage/' .$user->image)}}" alt="imagem do usuário" width="50px" height="50px" class="rounded-circle"></th>
          @else
          <th><img src="{{asset('storage/profile/avatar.png')}}" alt="imagem do usuário" width="50px" height="50px" class="rounded-circle"></th>
          @endif
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{$user->email }}</td>
          <td>
            <a href="{{ route ('posts.show', $user->id) }}" class="btn btn-outline-dark">Postagens - {{$user->posts->count()}}</a>
          </td>
          <td>{{date('d/m/Y - H:i', strtotime($user->created_at))}}</td>
          <td><a href="{{ route ('users.show', $user->id) }}" class="btn btn-primary">Visualizar</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    {{$users->links('pagination::bootstrap-5')}}
  </div>
@endsection