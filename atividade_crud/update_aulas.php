<?php
    include 'db.php';
    $id = $_GET['id'];
    if(isset($_POST['update_aula'])){
        $sala = $_POST['sala'];
        $materia = $_POST['materia'];
        $data_aula = $_POST['data_aula'];

        $sql = "UPDATE aulas SET sala = '$sala', materia = '$materia', data_aula = '$data_aula' WHERE id_aula = '$id'";
        if($conn -> query($sql) === true){
            echo "Seus dados foram atualizados com sucesso!";
        } else {
            echo "Deu ruim $sql <br>" . $conn -> error; 
        }
        $conn -> close ();
        header("Location: index.php");
        exit ();
    }
    $sql = "SELECT * FROM aulas WHERE id_aula=$id";
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
        <input type="text" name="sala" value="<?php echo $row['sala']; ?>" required><br></br>
        <label for="materia">Matéria:</label> 
        <input type="text" name="materia" value="<?php echo $row['materia']; ?>" required><br></br>
        <label for="data">Data da aula:</label> 
        <input type="date" name="data" value="<?php echo $row['data_aula']; ?>" required><br></br>
        <input type="submit" name="update_aula" value="Atualizar">
    </form>

</body>
</html>
