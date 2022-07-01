@extends('layouts.master')

@section('title', 'Meus Jogos')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Jogos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-games-container">
        @if (count($games) > 0)
        <div class="table-card">
            <table class="table table-bordered table-responsive table-sm text-center table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Plataforma</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/games/{{ $game->id }}">{{ $game->title }}</a></td>
                            <td>{{$game->kind}}</td>
                            <td>{{$game->price}}</td>
                            <td>{{$game->plataform}}</td>
                            <td>
                                <a href="/games/edit/{{ $game->id }}" class="btn btn-info btn-sm edit-btn mb-1">
                                    <ion-icon name="create-outline"></ion-icon> Editar
                                </a>
                                <form action="/games/{{ $game->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn mb-1">
                                        <ion-icon name="trash-outline"></ion-icon> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="col-md-3 mb-2" style="background-color: beige; padding: 5px;">
                <p>Você ainda não tem jogos cadastrados</p>
            </div>
            <a type="button" class="btn btn-warning"
                    href="/games/create">Cadastrar
                    jogo</a>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container p-1">
        <h1>Histórico de compras</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-games-container">
        @if (count($gamesAsBuyer) > 0)
        <div class="table-card">
            <table class="table table-bordered table-sm text-center table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Plataforma</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gamesAsBuyer as $game)
                        <tr>
                            <td script="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/games/{{ $game->id }}">{{ $game->title }}</a></td>
                            <td>{{$game->kind}}</td>
                            <td>{{$game->price}}</td>
                            <td>{{$game->plataform}}</td>
                            <td>
                                <form action="/games/leave/{{ $game->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon>
                                       Desistir da compra
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p>Você não comprou nenhum jogo, <a href="/">veja todos os jogos</a></p>
        @endif
    </div>
@endsection
