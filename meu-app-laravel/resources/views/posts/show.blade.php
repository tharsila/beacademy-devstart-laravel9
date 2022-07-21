@extends('template.users')
@section('title', "Listagem de Postagens do {$user->name}")
@section('content')
  <h1>Listagem de Postagens do {{$user->name}}</h1>

  @foreach($posts as $post)
    <div class="mb-3">
      <label class="form-label">Idenficação Nº: <strong>{{$post->id}}</strong></label>
      <br>
      <label class="form-label">Status: <strong>{{$post->active ? 'Ativo' : 'Inativo'}}</strong></label>
      <br>
      <label class="form-label">Titulo: <strong>{{$post->title}}</strong></label>
      <br>
      <label class="form-label">Postagem:</label>
      <br>
      <textarea class="form-control" rows="5">{{$post->post}}</textarea>
    </div>
  @endforeach
@endsection