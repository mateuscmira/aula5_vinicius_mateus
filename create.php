<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sala = $_POST['sala'];
    $disciplina = $_POST['disciplina'];
    $data_aula = $_POST['data_aula'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO Aulas (sala, disciplina, data_aula, horario) 
            VALUES ('$sala', '$disciplina', '$data_aula', '$horario')";

    if ($conn->query($sql) === TRUE) {
        echo "Nova aula registrada com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <h1>Cadastro de Aulas</h1>
    <form action="create.php" method="POST">
        <label for="sala">Sala:</label><br>
        <input type="text" id="sala" name="sala" required><br><br>
        <label for="disciplina">Disciplina:</label><br>
        <input type="text" id="disciplina" name="disciplina" required><br><br>
        <label for="data_aula">Data da Aula:</label><br>
        <input type="date" id="data_aula" name="data_aula" required><br><br>
        <label for="horario">Horário:</label><br>
        <input type="time" id="horario" name="horario" required><br><br>
        <input type="submit" value="Cadastrar Aula">
    </form>
    <a href="read.php">Ver registros.</a>
</body>

</html>