<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

</style>

<body class="bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Lista de Usuários</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark text-center">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>   
            <tbody>
                @forelse($users as $user)
                    <tr class="text-center">
                        <td>{{ $user['id'] }}</td> 
                        <td>{{ $user['nome'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            <a style href="{{ route('usuarios.show', $user['id']) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('usuarios.edit', $user['id']) }}" class="btn btn-primary ">Editar</a>
                            <form action="{{ route('usuarios.destroy', $user['id']) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum usuário cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="text-center">
            <a href="{{ route('usuarios.create') }}" class="btn btn-success">Novo Usuário</a>
        </div>
    </div>
</body>
</html>
