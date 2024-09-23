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
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inserindo aulas</title>
    </head>
    <body>
        <form method="post" action="create_profs.php">
            <h1> Adicionar professores</h1>
            Digite o nome do professor: <input type="text" name="nome" required> <br></br>
            Digite o Email do professor: <input type="email" name="email" required> <br></br>
            <input type="submit" value="Adicionar">
        </form>
    </body>
</html>

