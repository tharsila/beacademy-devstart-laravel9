@extends('template.users')
@section('title', 'Listagem de Postagens')
@section('content')
  <h1>Listagem de Postagens</h1>
  <table class="table table-hover">
    <thead class="table-dark text-center">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Usuário</th>
        <th scope="col">Titulo</th>
        <th scope="col">Postagem</th>
        <th scope="col">Data de Postagem</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @foreach($posts as $post)
        <tr>
          
          <th scope="row">{{ $post->id }}</th>
          <td>{{ $post->user->name }}</td>
          <td>{{ $post->title }}</td>
          <td>{{$post->post }}</td>
          <td>{{date('d/m/Y - H:i', strtotime($post->created_at))}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection