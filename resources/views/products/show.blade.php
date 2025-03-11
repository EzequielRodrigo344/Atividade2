<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h2 class="text-center mb-4">Detalhes do Produto</h2>
        <div class="card p-3">
            <p><strong>ID:</strong> {{ $product['id'] }}</p>
            <p><strong>Nome:</strong> {{ $product['nome'] }}</p>
            <p><strong>Descrição:</strong> {{ $product['descricao'] }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($product['preco'], 2, ',', '.') }}</p>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('produtos.index') }}" a class="btn btn-warning">Voltar</a>
            <a href="{{ route('produtos.edit', $product['id']) }}" class="btn btn-success">Editar</a>
        </div>
    </div> 
</body>
</html>
  