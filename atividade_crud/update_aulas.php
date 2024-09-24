<?php
    include 'db.php';

    $id = $_GET['id'];

    if(isset($_POST['update_aula'])){

        $sala = $_POST['sala'];
        $materia = $_POST['materia'];
        $data_aula = $_POST['data_aula'];

        $sql = "UPDATE aulas SET sala = '$sala', materia = '$materia' WHERE id_aula = '$id' ";


        if($conn -> query($sql) === true){
            echo "Seus dados foram atualizados com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        header ("Location: index.php");
        exit();
    }
    $sql = "SELECT * FROM aulas WHERE id_aula = '$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atualizando aulas</title>
</head>
<body>

    <form method="POST" action=" update.php?id=<?php echo $row['id_aula'];?>">
        <label for="sala">Sala de Aula:</label>
        <input type="text" name="sala" value="<?php echo $row['sala']; ?>" required>
        <label for="materia">Matéria:</label>
        <input type="text" name="materia" value="<?php echo $row['materia']; ?>" required>
        
        <input type="submit" value="Atualizar">
    </form>


</body>
</html>
