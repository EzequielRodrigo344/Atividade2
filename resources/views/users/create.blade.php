<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> 
    <div class="container my-5"> 
        <h2 class="text-center mb-4">Criar Usuário</h2>
        <form action="{{ route('usuarios.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
