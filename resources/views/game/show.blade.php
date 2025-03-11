<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5"> 
        <h2 class="text-center mb-4">Detalhes do jogo</h2>
        <div class="card p-3">
            <p><strong>ID:</strong> {{ $game['id'] }}</p>
            <p><strong>Nome:</strong> {{ $game['nome'] }}</p>
            <p><strong>Categoria:</strong> {{ $game['categoria'] }}</p> 
            <p><strong>Ano:</strong> {{ $game['ano'] }}</p>
            <p><strong>Nota:</strong> {{ $game['nota'] }}</p>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('jogos.index') }}" class="btn btn-warning">Voltar</a>
            <a href="{{ route('jogos.edit', $game['id']) }}" class="btn btn-sucess">Editar</a>
        </div>
    </div>  
</body>
</html>
