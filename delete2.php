<?php

include 'db.php';

$id_professores = $_GET['id'];

$sql = "DELETE FROM Professores WHERE id_professores=$id_professores";

if ($conn->query($sql) === TRUE) {
    echo "Registro excluído com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn -> close();

header ("Location: read2.php");
exit();
?>