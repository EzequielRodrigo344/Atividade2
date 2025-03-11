<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head> 
<body class="bg-light">
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Produtos</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>                   
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="text-center">
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['nome'] }}</td>
                        <td>{{ $product['descricao'] }}</td>
                        <td>R$ {{ number_format($product['preco'], 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('produtos.show', $product['id']) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('produtos.edit', $product['id']) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('produtos.destroy', $product['id']) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Excluir este produto?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum produto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="text-center">
            <a href="{{ route('produtos.create') }}" class="btn btn-success">Novo Produto</a>
        </div>
    </div>
</body>
</html>
