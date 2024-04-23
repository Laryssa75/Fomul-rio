<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Filme</title>
</head>
<body>
    <h1>Atualizar Filme</h1>

    <?php
    // Verifica se o ID do filme foi passado via GET
    if (isset($_GET['id'])) {
        $id_filme = $_GET['id'];

        // Conexão com o banco de dados
        $conexao = mysql_connect("localhost", "usuario", "senha");

        // Verifica se a conexão foi estabelecida corretamente
        if (!$conexao) {
            die("Erro na conexão: " . mysql_error());
        }

        // Seleciona o banco de dados
        mysql_select_db("nome_do_banco", $conexao);

        // Consulta para selecionar os dados do filme com base no ID
        $sql = "SELECT nome, genero, ano FROM filmes WHERE id = $id_filme";
        $resultado = mysql_query($sql, $conexao);

        // Verifica se há resultados
        if (mysql_num_rows($resultado) > 0) {
            // Exibe o formulário preenchido com os dados do filme selecionado
            $filme = mysql_fetch_assoc($resultado);
            ?>
            <form method="post" action="processar_atualizacao.php">
                <input type="hidden" name="id" value="<?php echo $id_filme; ?>">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $filme['nome']; ?>" required><br>
                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero" value="<?php echo $filme['genero']; ?>" required><br>
                <label for="ano">Ano:</label>
                <input type="date" id="ano" name="ano" value="<?php echo $filme['ano']; ?>" required><br>
                <button type="submit">Atualizar</button>
            </form>
            <?php
        } else {
            echo "Filme não encontrado.";
        }

        // Fecha a conexão com o banco de dados
        mysql_close($conexao);
    } else {
        echo "ID do filme não fornecido.";
    }
    ?>
</body>
</html>
