<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){

        $search = request('search');

        if($search) {

            $games = Game::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $games = Game::all();
        }     
        return view('home', ['games' => $games, 'search'=> $search]);
    }

    public function create() {
        return view('games.create');
    }

    public function store(Request $request) {

        $game = new Game;

        $game->title = $request->title;
        $game->plataform = $request->plataform;
        $game->kind = $request->kind;
        $game->price = $request->price;
        $game->description = $request->description;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('images/games'), $imageName);

            $game->image = $imageName;

        }

        $user = auth()->user();
        $game->user_id = $user->id;

        $game->save();

        return redirect('/')->with('message', 'Jogo cadastrado com sucesso!');;
    }

    public function show($id) {

        $game = Game::findOrFail($id);

        return view('games.show', ['game' => $game]);
        
    }

    // public function show($id) {

    //     $game = Game::findOrFail($id);

    //     $user = auth()->user();

    //     $hasUserJoined = false;

    //     if($user) {

    //         $usergames = $user->gamesAsParticipant->toArray();

    //         foreach($usergames as $userGame) {
    //             if($userGame['id'] == $id) {
    //                 $hasUserJoined = true;
    //             }
    //         }

    //     }

    //     $gameOwner = User::where('id', $game->user_id)->first()->toArray();

    //     return view('games.show', 
    //         ['game' => $game, 'gameOwner' => $gameOwner, 'hasUserJoined' => $hasUserJoined]);
        
    // }

    public function dashboard() {

        $user = auth()->user();

        $games = $user->games;

        // $gamesAsParticipant = $user->gamesAsParticipant;

        return view('games.dashboard', ['games' => $games]);

    }

    // public function destroy($id) {

    //     Game::findOrFail($id)->delete();

    //     return redirect('/dashboard')->with('message', 'Jogo excluído com sucesso!');

    // }

    // public function edit($id) {

    //     $game = Game::findOrFail($id);

    //     if(auth()->user()->id != $game->user_id){
    //         return redirect('/dashboard');
    //     }

    //     return view('games.edit', ['game' => $game]);

    // }

    // public function update(Request $request) {

    //     $data = $request->all();

    //     // Image Upload
    //     if($request->hasFile('image') && $request->file('image')->isValid()) {

    //         $requestImage = $request->image;

    //         $extension = $requestImage->extension();

    //         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

    //         $requestImage->move(public_path('images/games'), $imageName);

    //         $data['image'] = $imageName;

    //     }

    //     Game::findOrFail($request->id)->update($data);

    //     return redirect('/dashboard')->with('message', 'Jogo editado com sucesso!');

    // }

    // public function joinEvent($id) {

    //     $user = auth()->user();

    //     $user ->gamesAsParticipant()->attach($id);

    //     $event = Event::findOrFail($id);

    //     return redirect('/dashboard')->with('message', 'Sua presença está confirmada no evento ' . $event->title);

    // }

    // public function leaveEvent($id) {

    //     $user = auth()->user();

    //     $user->gamesAsParticipant()->detach($id);

    //     $event = Event::findOrFail($id);

    //     return redirect('/dashboard')->with('message', 'Você saiu com sucesso do evento: ' . $event->title);

    // }
}
