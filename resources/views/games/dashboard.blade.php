@extends('layouts.master')

@section('title', 'Meus Jogos')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Jogos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-games-container">
        @if (count($games) > 0)
            <table class="table table-bordered table-sm text-center table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/games/{{ $game->id }}">{{ $game->title }}</a></td>
                            <td>258</td>
                            <td>
                                <a href="/games/edit/{{ $game->id }}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon> Editar
                                </a>
                                <form action="/games/{{ $game->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="col-md-3 mb-2" style="background-color: beige; padding: 5px;">
                <p>Você ainda não tem jogos cadastrados</p>
            </div>
            <a type="button" class="btn btn-warning"
                    href="/games/create">Cadastrar
                    jogo</a>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Histórico de compras</h1>
    </div>
    {{-- <div class="col-md-10 offset-md-1 dashboard-games-container">
        @if (count($gamesAsParticipant) > 0)
            <table class="table table-bordered table-sm text-center table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gamesAsParticipant as $game)
                        <tr>
                            <td script="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/games/{{ $game->id }}">{{ $game->title }}</a></td>
                            <td>{{ count($game->users) }}</td>
                            <td>
                                <form action="/games/leave/{{ $game->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon>
                                        Sair do Evento
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não está participando de nenhum evento, <a href="/">veja todos os eventos</a></p>
        @endif
    </div> --}}
@endsection
