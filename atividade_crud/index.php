<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div>
            <form method="POST">
                Sala de Aula:<input type="text" name="sala" required><br><br>
                Materia:<input type="text" name="materia" required><br><br>
                data_aula:<input type="date" name="data_aula" required><br><br><br>
                <input type="submit" name="create_aula" value="Adcionar">
            </form>
        </form>
        </div>    
    </body>
 </html>
<?php
    include 'db.php';

    if (isset($_POST['create_aula'])) {
        $sala = $_POST['sala'];
        $materia = $_POST['materia'];
        $data_aula = $_POST['data_aula'];
    
        $sql = "INSERT INTO aulas (sala, materia,  data_aula) VALUES ('$sala', '$materia', '$data_aula')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Novo pedido adicionado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "SELECT * FROM aulas;";

    $result = $conn -> query($sql);

    if ($result -> num_rows > 0){
        echo "<table border='1'>
            <tr>
                <th> ID Aula </th>
                <th> Sala </th>
                <th> Materia </th>
                <th> Data Aula </th>
            
            </tr>";
            while($row = $result -> fetch_assoc()){
                echo "<tr>
                        <td> {$row['id_aula']} </td>
                        <td> {$row['sala']} </td>
                        <td> {$row['materia']} </td>
                        <td> {$row['data_aula']} </td>
                        <td>
                            <a href='update_aulas.php?id={$row['id_aula']}'>Editar</a> |
                            <a href='delete.php?id={$row['id_aula']}'>Excluir</a>
                        </td>
                    </tr>";
            }
        echo "</table>";
        echo "<br> <hr> <br>";
    }else{
        echo "Nenhum registro encontrado.";
    }

    $sql = "SELECT * FROM professores;";

    $result = $conn -> query($sql);

    if ($result -> num_rows > 0){
        echo "<table border='1'>
            <tr>
                <th> ID Professor </th>
                <th> Nome </th>
                <th> Email </th>
            </tr>";
            while($row = $result -> fetch_assoc()){
                echo "<tr>
                        <td> {$row['id_professor']} </td>
                        <td> {$row['nome']} </td>
                        <td> {$row['email']} </td>
                        <td>
                            <a href='update_profs.php?id={$row['id_professor']}'>Editar</a> |
                            <a href='delete_profs.php?id={$row['id_professor']}'>Excluir</a>
                        </td>
                    </tr>";
            }
        echo "</table>";
        echo "<a href='create_profs.php'>Deseja adicionar um novo professor?</a>";
    }else{
        echo "Nenhum registro encontrado.";
    }

    ?>
    
