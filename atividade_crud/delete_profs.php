<?php

    include 'db.php';



    $id = $_GET['id'];

    $sql = "DELETE FROM professores WHERE id_professor=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn -> close();

    header ("Location: create_profs.php");
    exit();
?>