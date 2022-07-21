@extends('template.users')
@section('title', 'Novo Usuário')
@section('content')
  <h1>Novo Usuário</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        {{$error}}<br/>
      @endforeach
    </div>
  @endif

  <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name">Nome</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3"">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3"">
      <label for="password">Senha</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3"">
      <label for="image">Selecione uma imagem</label>
      <input type="file" name="image" id="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
@endsection
