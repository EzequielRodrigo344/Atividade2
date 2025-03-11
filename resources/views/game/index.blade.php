<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Jogo</h2>

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
                    <th>Categoria</th>
                    <th>Ano</th>
                    <th>Nota</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($games as $game)
                    <tr class="text-center">
                        <td>{{ $game['id'] }}</td>
                        <td>{{ $game['nome'] }}</td>
                        <td>{{ $game['categoria'] }}</td>
                        <td>{{ $game['ano'] }}</td>
                        <td>{{ $game['nota'] }}</td>
                        <td>
                            <a href="{{ route('jogos.show', $game['id']) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('jogos.edit', $game['id']) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('jogos.destroy', $game['id']) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Excluir este Jogo?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum jogo cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="text-center">
            <a href="{{ route('jogos.create') }}" class="btn btn-success">Novo Jogo</a>
        </div>
    </div>
</body>
</html>
  