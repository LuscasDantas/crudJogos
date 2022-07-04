@extends('layouts.master')

@section('title', 'Visualizar Jogo')

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row" id="gamePageCard">
      <div id="image-container" class="col-md-6">
        <img src="/images/games/{{ $game->image }}" class="img-fluid" alt="{{ $game->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $game->title }}</h1>
        <p class="game-city"><ion-icon name="cash-outline"></ion-icon> R$ {{ $game->price }}</p>
        <p class="games-participants"><ion-icon name="checkmark-outline"></ion-icon>{{$game->status == 'available' ? 'Disponível' : 'Indisponível'}}</p>
        <p class="game-owner"><ion-icon name="person-outline"></ion-icon> Vendedor: {{$gameOwner['name']}}</p>
        @if(!$hasUserBought)
        <form action="/games/buy/{{ $game->id }}" method="POST">
          @csrf
          <a href="/games/buy/{{ $game->id }}" 
            class="btn btn-primary" 
            id="game-submit"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            Comprar
          </a>
        </form>
        @else
          <p class="already-joined-message">Você já comprou este jogo!</p>
          <form action="/games/buy/{{ $game->id }}" method="POST">
            @csrf
            <a href="/games/buy/{{ $game->id }}" 
              class="btn btn-primary" 
              id="game-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Comprar Novamente
            </a>
          </form>
        @endif
      <div class="col-md-12 mt-1" id="description-container">
        <h3>Descrição do jogo:</h3>
        <div class="col-md-12 p-0">
            <p>{{ $game->description }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection