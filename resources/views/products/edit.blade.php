<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h2 class="text-center mb-4">Editar Produto</h2>
        <form action="{{ route('produtos.update', $product['id']) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $product['nome'] }}" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" required>{{ $product['descricao'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="number" step="0.01" name="preco" id="preco" class="form-control" value="{{ $product['preco'] }}" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('produtos.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</body>  
</html>   
  