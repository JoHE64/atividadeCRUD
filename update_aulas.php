<?php
    include 'db.php';
    $id = $_GET['id'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $sql = "UPDATE aulas SET nome = '$nome', email = '$email' WHERE id_aula = '$id'";
        if($conn -> query($sql) === true){
            echo "Seus dados foram atualizados com sucesso!";
        } else {
            echo "Deu ruim $sql <br>" . $conn -> error; 
        }
        $conn -> close ();
        header("Location: read.php");
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
        <label for="sala">Nome da turma:</label> <br></br>
        <input type="text" name="sala" value="<?php echo $row['sala']; ?>" required>
        <label for="materia">Matéria da aula:</label> <br></br>
        <input type="text" name="materia" value="<?php echo $row['materia']; ?>" required>
        <label for="data">Data da aula:</label> <br></br>
        <input type="date" name="data" value="<?php echo $row['data_aula']; ?>" required>
        <input type="submit" value="Atualizar">
    </form>

</body>
</html>
