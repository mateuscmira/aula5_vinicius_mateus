<?php

include 'db.php';

$sql = "SELECT * FROM Professores";

$result = $conn -> query($sql);

<br>
<a href="create2.php">Inserir novo registro.</a>

if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Especialidade</th>
                    <th>Data de Contratação</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_professores']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['telefone']}</td>
                    <td>{$row['especialidade']}</td>
                    <td>{$row['data_contratacao']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum professor encontrado.";
    }

    $conn->close();
    ?>