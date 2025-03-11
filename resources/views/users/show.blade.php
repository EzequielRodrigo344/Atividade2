<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h2 class="text-center mb-4">Detalhes do Usuário</h2>
        <div class="card p-3">
            <p><strong>ID:</strong> {{ $user['id'] }}</p>
            <p><strong>Nome:</strong> {{ $user['nome'] }}</p>
            <p><strong>Email:</strong> {{ $user['email'] }}</p>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('usuarios.index') }}" class="btn btn-warning">Voltar</a>
            <a href="{{ route('usuarios.edit', $user['id']) }}" class="btn btn-success">Editar</a>
        </div>
    </div>
</body>
</html>
      