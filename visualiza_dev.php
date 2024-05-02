<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Filmes</title>
</head>

<body>
    <center>
        <h1>Filmes Cadastrados</h1>

        <table border="4">
            <tr>
                <td>NOME</td>
                <td>GENERO</td>
                <td>ANO</td>
            </tr>
            <?php
                require("conecta.php");

                $dados_select = mysqli_query($conn, "SELECT ID, NOME, GENERO, ANO FROM filme");

                while($dado = mysqli_fetch_array($dados_select)) {
                        echo '<tr>';
                        echo '<td>'.$dado[1].'</td>';
                        echo '<td>'.$dado[2].'</td>';
                        echo '<td>'.$dado[3].'</td>';
                        echo "<td><a href='./excluir.php?id=".$dado[0]."'>Excluir</a></td>";
                        echo "<td><a href='./edicaofilme.php?id=".$dado[0]."'>Edição</a></td>";
                        echo '</tr>';
                }
            ?>
        </table>
        <br />
        <a href="index.php"><input type="button" value="Voltar"></a>
    </center>
</body>

</html>