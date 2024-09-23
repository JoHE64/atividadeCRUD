<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div>
            <form method="POST">
                Sala:<input type="text" name="sala" required>
                Materia:<input type="text" name="materia" required>
                data_aula:<input type="date" name="data_aula" required>
                <input type="submit" name="create_aula" value="Adcionar">
            </form>

        </div>    


    </body>
 </html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "crudAulas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

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
                            <a href='update.php?id={$row['id_aula']}'>Editar</a> |
                            <a href='delete.php?id={$row['id_aula']}'>Excluir</a>
                        </td>
                    </tr>";
            }
        echo "</table>";
    }else{
        echo "Nenhum registro encontrsado.";
    }


    ?>
