@extends('template.users')
@section('title', "Usuário {$user->name}" )
@section('content')
  <h1>Editar Usuário {{$user->name}}</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        {{$error}}<br/>
      @endforeach
    </div>
  @endif

  <form action="{{route('users.update', $user->id)}}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
      </div>
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
      <label for="password">Senha</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
  </form>
@endsection