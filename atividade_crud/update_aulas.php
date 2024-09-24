<?php
    include 'db.php';

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $sala = $_POST['sala'];
        $materia = $_POST['materia'];
        $data_aula = $_POST['data_aula'];

        $sql = "UPDATE aulas SET sala='$sala', materia='$materia', data_aula='$data_aula' WHERE id_aula=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn ->close();
        header ("Location: index.php");
        exit();
    }

    $sql = "SELECT * FROM aulas WHERE id_aula='$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update aulas</title>
</head>
<body>
    
    <form method="POST" action=" update_aulas.php?id=<?php echo $row['id_aula'];?>">
        <h1> Para atualizar os dados da aula, insira: </h1>
        <label for="sala">Novo nome da turma:</label>
        <input type="text" name="sala" value="<?php echo $row['sala']; ?>" required><br><br>
        <label for="materia">Nova materia:</label>
        <input type="text" name="materia" value="<?php echo $row['materia']; ?>" required><br><br>
        <label for="data">Nova data da aula:</label>
        <input type="date" name="data_aula" value="<?php echo $row['data_aula']; ?>" required><br><br>
        <input type="submit" value="Atualizar">
    </form>

</body>
</html>