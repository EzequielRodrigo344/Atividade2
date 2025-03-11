<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            margin-top: 50px;
            color: #333;
        }
        .button-container {
            margin-top: 30px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Selecione a opção que deseja criar!</h1>
    <div class="button-container">
        <a href="{{ route('usuarios.index') }}" class="button">Usuários</a>
        <a href="{{ route('produtos.index') }}" class="button">Produtos</a>
        <a href= "{{ route('jogos.index') }}" class="button">Jogos</a>
    </div>
</body>
</html>
