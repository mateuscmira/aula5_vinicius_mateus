<?php

include 'db.php';

$id_aulas = $_GET['id'];

$sql = "DELETE FROM aulas WHERE id_aulas=$id_aulas";

if ($conn->query($sql) === TRUE) {
    echo "Registro excluído com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn -> close();

header ("Location: read.php");
exit();
?>