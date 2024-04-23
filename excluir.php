<?php
require('conecta.php');

$id = $_GET['id'];

$sql = "DELETE FROM filme WHERE id = $id";

if($conn->query($sql) === TRUE){
    echo "<h1>Registro excluído</h1>";
    echo "<a href='index.php'><input type='button' value='Voltar'></a>";
} else {
    echo "<h1>Erro:". $conn->error."</h1>";
    echo "<a href='index.php'><input type='button' value='Voltar'></a>";
}