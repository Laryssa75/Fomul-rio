<?php
    require("conecta.php");

    $nome = $_POST['nome'];
    $genero =  $_POST['genero'];
    $ano = $_POST['ano'];
    $generofilme = $_POST['generofilme'];
    $experiencia = $_POST['experiencia'];

    $sql = "INSERT INTO filme (nome, genero, ano, generofilme, experiencia)
    VALUES ('$nome', '$genero', '$ano', '$generofilme', '$experiencia')";

    if ($conn->query($sql) === TRUE) {
      echo "<center><h1>Registro Inserido com Sucesso</h1>";
      echo "<a href='index.php'><input type='button' value='Voltar'></a></center>";
    } else {
      echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
?>