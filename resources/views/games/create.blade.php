@php
    $options = \App\Models\Game::PLATAFORM;
    $translate = \App\Models\Game::PLATAFORM_TRANSLATE;
@endphp
@extends('layouts.master')

@section('title', 'Cadastrar Jogo')

@section('content')
<div id="game-create-container" class="col-md-6 offset-md-3">
    <h1 class="text-center">Cadastre um jogo</h1>
    <form action="/games" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="image">Capa do Jogo</label>
          <input type="file" id="image" name="image" class="form-control-file" required>
        </div>
      <div class="form-group">
        <label for="title">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Ex: Donkey Kong" required>
      </div>
      <div class="form-group">
          <label for="price">Preço</label>
          <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}" placeholder="Ex: R$ 54,90" required>
        </div>
      <div class="form-group">
        <label for="kind">Gênero/Categoria</label>
        <input type="text" class="form-control" id="kind" name="kind" value="{{old('kind')}}" placeholder="Ex: Aventura" required>
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
        <textarea name="description" id="description" class="form-control" placeholder="Faça uma breve descrição do jogo"></textarea>
      </div>
      <input type="submit" class="btn btn-primary" value="Cadastrar Jogo">
    </form>
  </div>
@endsection