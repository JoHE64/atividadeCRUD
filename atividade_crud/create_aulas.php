<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inserindo aulas</title>
    </head>
    <body>
    <form method="post" action="create_aulas.php">
            <h1> Adicionar aulas</h1>
            Digite a turma em que a aula foi dada: <input type="text" name="sala" required> <br></br>
            Digite a materia dessa aula: <input type="text" name="materia" required> <br></br>
            Digite a data dessa aula: <input type="date" name="data" required> <br></br>
            <input type="submit" value="Adicionar">
        </form>
    </body>
</html>

<?php
    include 'db.php';

    if (isset($_POST['create_aulas'])) {
        $sala = $_POST['sala'];
        $materia = $_POST['materia'];
        $data = $_POST['data'];

        $sql = "INSERT INTO aulas (sala, materia, data_aula) VALUES ('$sala', '$materia', '$data')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo registro criado com sucesso";
        } else {
            echo "Deu ruim: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>