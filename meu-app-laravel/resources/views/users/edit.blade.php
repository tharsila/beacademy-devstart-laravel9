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

  <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="name">Nome</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
    </div>
    <div class="mb-3">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
    </div>
    <div class="mb-3">
      <label for="password">Senha</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
      <label for="image">Selecione uma imagem</label>
      <input type="file" name="image" id="image" class="form-control">
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" value="1" id="admin" name="admin">
      <label class="form-check-label" for="flexCheckDefault">
        Administrador
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
@endsection