<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Jogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h2 class="text-center mb-4">Editar Jogo</h2>
        <form action="{{ route('jogos.update', $game['id']) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $game['nome'] }}" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input type="text" name="categoria" id="categoria" class="form-control" value="{{ $game['categoria'] }}" required>
            </div>           
            <div class="mb-3">
                <label for="ano" class="form-label">Ano:</label>
                <input type="number" name="ano" id="ano" class="form-control" value="{{ $game['ano'] }}" required>
            </div>
            <div class="mb-3">
                <label for="nota" class="form-label">Nota:</label>
                <input type="number" name="nota" id="nota" class="form-control" value="{{ $game['nota'] }}" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('jogos.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form> 
    </div> 
</body>
</html>
