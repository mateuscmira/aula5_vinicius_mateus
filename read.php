<?php

include 'db.php';

$sql = "SELECT * FROM Aulas";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Sala</th>
            <th>Disciplina</th>
            <th>Data da aula</th>
            <th>Horário</th>
            <th>Ações</th>
        </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_aulas']}</td>
                <td>{$row['sala']}</td>
                <td>{$row['disciplina']}</td>
                <td>{$row['data_aula']}</td>
                <td>{$row['horario']}</td>
                <td>
                    <a href='update.php?id={$row['id_aulas']}'>Editar</a> |
                    <a href='delete.php?id={$row['id_aulas']}'>Excluir</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>

<br>
<a href="create.php">Inserir novo registro.</a>
<br>
<a href="index.html">Voltar para página inicial.</a>
