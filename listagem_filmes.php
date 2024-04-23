<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Filmes</title>
</head>
<body>
    <h1>Listagem de Filmes</h1>

    <?php
    // Conexão com o banco de dados
    $conexao = mysqli_connect("localhost", "usuario", "senha", "nome_do_banco");

    // Verifica se a conexão foi estabelecida corretamente
    if (!$conexao) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    // Consulta para selecionar todos os filmes
    $sql = "SELECT id, nome, genero, ano FROM filmes";
    $resultado = mysql_query($sql, $conexao);

    // Verifica se há resultados
    if (mysql_num_rows($resultado) > 0) {
        // Exibe os filmes em uma tabela
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Gênero</th><th>Ano</th><th>Ações</th></tr>";
        while ($linha = mysql_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['genero'] . "</td>";
            echo "<td>" . $linha['ano'] . "</td>";
            echo "<td><a href='atualizar_filme.php?id=" . $linha['id'] . "'>Editar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum filme cadastrado.";
    }

    // Fecha a conexão com o banco de dados
    mysql_close($conexao);
    ?>
</body>
</html>
