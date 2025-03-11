<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
        
    public function index()
    {  
        $users = session('users', []); 
        return view('users.index', compact('users'));
    }

    
    public function create()
    {
        return view('users.create');
    }

   
    public function store(Request $request)
    {
        
        $users = session('users', []);

        $newUser = [
            'id'    => count($users) + 1,
            'nome'  => $request->input('nome'),
            'email' => $request->input('email'),
        ];

        $users[] = $newUser;
        session(['users' => $users]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

   
    public function show($id)
    {
        $users = session('users', []);
        $user = collect($users)->firstWhere('id', (int)$id);

        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'Usuário não encontrado!');
        }

        return view('users.show', compact('user'));
    }

    
    public function edit($id)
    {
        $users = session('users', []);
        $user = collect($users)->firstWhere('id', (int)$id);

        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'Usuário não encontrado!');
        }

        return view('users.edit', compact('user'));
    }

    
    public function update(Request $request, $id)
{
    $users = session('users', []);

   
    foreach ($users as $key => $user) {
        if ($user['id'] == $id) {
            $users[$key]['nome']  = $request->input('nome');
            $users[$key]['email'] = $request->input('email');
            break;
        }
    }

    session(['users' => $users]);

    return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
}

    
    public function destroy($id)
    {
        $users = session('users', []);

        foreach ($users as $key => $user) {
            if ($user['id'] == $id) {
                unset($users[$key]);
                break;
            }
        }

        
        $users = array_values($users);
        session(['users' => $users]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário removido com sucesso!');
    }
}
