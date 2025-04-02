<?php

namespace App\Http\Controllers;

use App\Models\Game; 
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('game.index', compact('games'));
    }

    public function create()
    {
        return view('game.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'ano' => 'required|numeric',
            'nota' => 'required|numeric',
        ]);

 
        Game::create([
            'nome' => $request->input('nome'),
            'categoria' => $request->input('categoria'),
            'ano' => $request->input('ano'),
            'nota' => $request->input('nota'),
        ]);

        return redirect()->route('jogos.index')->with('success', 'Jogo criado com sucesso!');
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('game.show', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id); 
        return view('game.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

      
        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'ano' => 'required|numeric',
            'nota' => 'required|numeric',
        ]);

       
        $game->update([
            'nome' => $request->input('nome'),
            'categoria' => $request->input('categoria'),
            'ano' => $request->input('ano'),
            'nota' => $request->input('nota'),
        ]);

        return redirect()->route('jogos.index')->with('success', 'Jogo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('jogos.index')->with('success', 'Jogo removido com sucesso!');
    }
}