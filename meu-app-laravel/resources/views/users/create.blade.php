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

  <form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="form-group">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="password">Senha</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Enviar</button>
  </form>
@endsection
