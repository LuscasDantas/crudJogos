@php
    $options = \App\Models\Game::PLATAFORM;
    $translate = \App\Models\Game::PLATAFORM_TRANSLATE;
@endphp
@extends('layouts.master')

@section('title', 'Editar Jogo:' . $game->title)

@section('content')

<div id="game-create-container" class="col-md-6 offset-md-3">
    <h1 class="text-center">Editando {{$game->title}}</h1>
    <form action="/games/update/{{$game->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
          <label for="image">Capa do Jogo</label>
          <input type="file" id="image" name="image" class="from-control-file">
          <img src="/images/games/{{ $game->image }}" alt="{{ $game->title }}" class="img-preview">
        </div>
      <div class="form-group">
        <label for="title">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$game->title}}" placeholder="Ex: Donkey Kong" required>
      </div>
      <div class="form-group">
          <label for="price">Preço</label>
          <input type="text" class="form-control" id="price" name="price" value="{{$game->price}}" placeholder="Ex: R$ 54,90" required>
        </div>
      <div class="form-group">
        <label for="kind">Gênero/Categoria</label>
        <input type="text" class="form-control" id="kind" name="kind" value="{{$game->kind}}" placeholder="Ex: Aventura" required>
      </div>
      <div class="form-group">
        <label for="plataform">Plataforma</label>
        <select name="plataform" id="plataform" class="form-control">
            <option selected disabled hidden>Selecione</option>
            @foreach($translate as $key => $t)
                <option value="{{$key}}">{{$t}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" class="form-control" placeholder="Faça uma breve descrição do jogo">{{$game->description}}</textarea>
      </div>
      <input type="submit" class="btn btn-primary" value="Editar Jogo">
    </form>
  </div>
@endsection