<?php
include 'db.php';

    if (isset($_POST['create_profs'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $sql = "INSERT INTO professores (nome, email) VALUES ('$nome', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo registro criado com sucesso";
        } else {
            echo "Deu ruim: " . $sql . "<br>" . $conn->error;
        }
    } 

    $conn->close();

    $sql = "SELECT * FROM professores;";

    $result = $conn -> query($sql);

    if ($result -> num_rows > 0){
        echo "<table border='1'>
            <tr>
                <th> ID Professor </th>
                <th> Nome </th>
                <th> email </th>
            </tr>";
            while($row = $result -> fetch_assoc()){
                echo "<tr>
                        <td> {$row['id_professor']} </td>
                        <td> {$row['nome']} </td>
                        <td> {$row['email']} </td>

                        <td>
                            <a href='update.php?id={$row['id_professor']}'>Editar</a> |
                            <a href='delete.php?id={$row['id_professor']}'>Excluir</a>
                        </td>
                    </tr>";
            }
        echo "</table>";
    }else{
        echo "Nenhum registro encontrado.";
    }


?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inserindo profs</title>
    </head>
    <body>
        <form method="post" action="create_profs.php">
            <h1> Adicionar professores</h1>
            Digite o nome do professor: <input type="text" name="nome" required> <br></br>
            Digite o Email do professor: <input type="email" name="email" required> <br></br>
            <input type="submit" name="create_profs" value="Adicionar">
        </form>
    </body>
</html>

