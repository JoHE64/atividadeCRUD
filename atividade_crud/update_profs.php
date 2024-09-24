<?php
    include 'db.php';

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $sql = "UPDATE professores SET nome='$nome', email='$email' WHERE id_professor=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn ->close();
        header ("Location: index.php");
        exit();
    }

    $sql = "SELECT * FROM professores WHERE id_professor='$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update professores</title>
</head>
<body>
    
    <form method="POST" action=" update_profs.php?id=<?php echo $row['id_professor'];?>">
        <h1> Para atualizar os dados do professor, insira: </h1>
        <label for="nome">Novo nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
        <label for="email">Novo email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><
        <input type="submit" value="Atualizar">
    </form>

</body>
</html>