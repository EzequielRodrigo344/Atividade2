<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
  
    public function index()
    {
        $games = session('games', []);   
        return view('game.index', compact('games'));
    }

    
    public function create()
    {
        return view('game.create');
    }

   
    public function store(Request $request)
    {
        $games = session('games', []);

        $newgame = [
            'id'            => count($games) + 1,
            'nome'          => $request->input('nome'),
            'categoria'     => $request->input('categoria'),
            'ano'           => $request->input('ano'),
            'nota'          => $request->input('nota'),
            
        ];

        $games[] = $newgame;
        session(['games' => $games]);

        return redirect()->route('jogos.index')->with('success', 'Jogo registrado com sucesso!');
    }

    
    public function show($id)
    {
        $games = session('games', []);
        $game = collect($games)->firstWhere('id', (int)$id);

        if (!$game) {
            return redirect()->route('jogos.index')->with('error', 'Jogo não encontrado!');
        }

        return view('game.show', compact('game'));
    }

   
    public function edit($id)
    { 
        $games = session('games', []);
        $game = collect($games)->firstWhere('id', (int)$id);

        if (!$game) {
            return redirect()->route('jogos.index')->with('error', 'Jogo não encontrado!');
        }

        return view('game.edit', compact('game'));
    }

   
    public function update(Request $request, $id)
    {
        $games = session('games', []);

        foreach ($games as $key => $game) {
            if ($game['id'] == $id) {
                $games[$key]['nome']  = $request->input('nome');
                $games[$key]['categoria'] = $request->input('categoria');
                $games[$key]['ano']= $request->input('ano');
                $games[$key]['nota']= $request->input('nota');
                break;
            }
        }

        session(['games' => $games]);

        return redirect()->route('jogos.index')->with('success', 'Jogo atualizado com sucesso!');
    }

    
    public function destroy($id)
    {
        $games = session('games', []);

        foreach ($games as $key => $game) {
            if ($game['id'] == $id) {
                unset($games[$key]);
                break;
            }
        }

       
        $games = array_values($games);
        session(['games' => $games]);

        return redirect()->route('jogos.index')->with('success', 'Jogo removido com sucesso!');
    
    }
}
