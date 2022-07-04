@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="row" id="greetings">
        <h1>Bem vindo à Gamer Universe!</h1>
    </div>
    <div id="search-container" class="col-md-12">
        <h1>Busque um jogo</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Buscar...">
        </form>
    </div>
    <div id="games-container" class="col-md-12">
        @if ($search)
            <h2>Buscando por: {{ $search }}</h2>
        @endif

        <div id="cards-container" class="row">
            @foreach ($games as $game)
                <div class="card col-md-3">
                    <img src="/images/games/{{ $game->image }}" alt="{{ $game->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <div class="card_kind_price  mb-2">
                            <p>Gênero: {{ $game->kind }}</p>
                            <strong class="card-price">R$ {{ $game->price }}</strong>
                        </div>
                        <div id="card-status">
                            <a href="/games/{{ $game->id }}" class="btn btn-primary">Comprar</a>
                            <strong class="games-status" style="{{$game->status == 'available' ? 'color:green' : 'color:red'}}">
                                <ion-icon name="checkmark-outline"></ion-icon>
                                {{ $game->status == 'available' ? 'Disponível' : 'Indisponível' }}
                            </strong>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($games) == 0 && $search)
                <div style="background-color: beige; padding: 5px;">
                    <p>Não foi possível encontrar nenhum jogo com {{ $search }}! <a href="/">Ver todos</a></p>
                </div>
            @elseif(count($games) == 0)
                <div style="background-color: beige; padding: 5px;">
                    <p>Não há jogos disponíveis</p>
                </div>
            @endif
        </div>
    </div>

@endsection
