<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = session('products', []);
        return view('products.index', compact('products'));
    }  

    
    public function create()
    { 
        return view('products.create');
    }

    
    public function store(Request $request)
    {
        $products = session('products', []);

        $newProduct = [
            'id'          => count($products) + 1,
            'nome'        => $request->input('nome'),
            'descricao'   => $request->input('descricao'),
            'preco'       => $request->input('preco'),
        ];

        $products[] = $newProduct;
        session(['products' => $products]);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

        public function show(string $id)
    {
        $products = session('products', []);
        $product = collect($products)->firstWhere('id', (int)$id);

        if (!$product) {
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado!');
        }

        return view('products.show', compact('product'));
    }

    
    public function edit(string $id)
    {
        $products = session('products', []);
        $product = collect($products)->firstWhere('id', (int)$id);

        if (!$product) {
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado!');
        }

        return view('products.edit', compact('product'));
    }

    
    public function update(Request $request, $id)
    {
        $products = session('products', []);

        foreach ($products as $key => $product) {
            if ($product['id'] == $id) {
                $products[$key]['nome']      = $request->input('nome');
                $products[$key]['descricao'] = $request->input('descricao');
                $products[$key]['preco']     = $request->input('preco');
                break;
            }
        }

        session(['products' => $products]);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    
    public function destroy($id)
    {
        $products = session('products', []);

        foreach ($products as $key => $product) {
            if ($product['id'] == $id) {
                unset($products[$key]);
                break;
            }
        }

    
        $products = array_values($products);
        session(['products' => $products]);

        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
