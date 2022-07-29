@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('content')
<div class="d-flex justify-content-center mt-5">
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{asset('storage/dash.jfif')}}" alt="Dashboard">
    <div class="card-body">
      <h5 class="card-title">Bem vindo ao Dashboard</h5>
      <p class="card-text">E lá vamos nós!</p>
    </div>
  </div>
</div>
@endsection