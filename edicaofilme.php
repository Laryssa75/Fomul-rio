<?php
    require("conecta.php");
    // Verifica se o ID do filme foi passado via GET
    if (isset($_GET['id'])) {
        $id_filme = $_GET['id'];
        $nome = "";
        $genero =  "";
        $ano = "";
        // Consulta para selecionar os dados do filme com base no ID
        $dados_select = mysqli_query($conn, "SELECT nome, genero, ano FROM filme WHERE id = $id_filme");
        while($dado = mysqli_fetch_array($dados_select)) {
            $nome = $dado[0];
            $genero =  $dado[1];
            $ano = $dado[2];
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Filme</title>
</head>
<body>
    <h1>Atualizar Filme</h1>

   
            <form method="post" action="./processar_atualizacao.php">
                <input type="hidden" name="id" value="<?= $id_filme; ?>">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= $nome; ?>" required><br>
                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero" value="<?= $genero; ?>" required><br>
                <label for="ano">Ano:</label>
                <input type="date" id="ano" name="ano" value="<?= $ano; ?>" required><br>
                <button type="submit">Atualizar</button>
            </form>
</body>
</html>