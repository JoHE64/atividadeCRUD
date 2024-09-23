<?php
    include 'db.php';


    $sql = "SELECT * FROM aulas";

    $result = $conn -> query($sql);

    if ($result -> num_rows > 0){
        echo "<table border='1'>
            <tr>
                <th> ID </th>
                <th> Sala </th>
                <th> Materia </th>
                <th> Data Aula </th>
                <th> Data Criação </th>
            </tr>";
            while($row = $result -> fetch_assoc()){
                echo "<tr>
                        <td> {$row['id']} </td>
                        <td> {$row['sala']} </td>
                        <td> {$row['materia']} </td>
                        <td> {$row['data_aula']} </td>
                        <td> {$row['created_at']} </td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Editar</a> |
                            <a href='delete.php?id={$row['id']}'>Excluir</a>
                        </td>
                    </tr>";
            }
        echo "</table>";
    }else{
        echo "Nenhum registro encontrado.";
    }
    $conn -> close();
    ?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div>
            

        </div>    


    </body>
    </html>