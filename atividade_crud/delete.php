<?php

include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM aulas WHERE id_aula=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro excluído com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn -> close();

header ("Location: index.php");
exit();
?>