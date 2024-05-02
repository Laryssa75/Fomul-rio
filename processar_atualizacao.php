<?php
    require("conecta.php");

    // Recuperar os valores do formulário
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];
    $id = $_POST['id'];

    // Preparar a instrução SQL
    $sql = "UPDATE filme SET nome = ?, genero = ?, ano = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação da instrução falhou
    if ($stmt === false) {
        echo "<h3>OCORREU UM ERRO AO PREPARAR A INSTRUÇÃO: </h3>" . $conn->error;
        exit(); // Encerrar o script se houver um erro
    }

    // Vincular os parâmetros
    $stmt->bind_param("ssii", $nome, $genero, $ano, $id);

    // Executar a instrução
    if ($stmt->execute()) {
        echo "<center><h1>Registro Atualizado com Sucesso!</h1>";
        echo "<a href='index.php'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO AO EXECUTAR A ATUALIZAÇÃO: </h3>" . $stmt->error;
    }

    // Fechar a instrução
    $stmt->close();

    // Fechar a conexão
    $conn->close();
?>
