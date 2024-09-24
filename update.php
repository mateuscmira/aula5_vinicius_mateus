<?php
    include 'db.php';

    $id_aulas = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $sala = $_POST['sala'];
        $disciplina = $_POST['disciplina'];
        $data_aula = $_POST['data_aula'];
        $horario = $_POST['horario'];

        $sql = "UPDATE aulas SET sala='$sala', disciplina='$disciplina', data_aula ='$data_aula', horario ='$horario' WHERE id_aulas=$id_aulas";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn ->close();
        header ("Location: read.php");
        exit();
    }

    $sql = "SELECT * FROM aulas WHERE id_aulas=$id_aulas";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    
    <form method="POST" action=" update.php?id=<?php echo $row['id_aulas'];?>">
        <label for="sala">Sala:</label>
        <input type="text" name="sala" value="<?php echo $row['sala']; ?>" required>
        <label for="disciplina">Disciplina:</label>
        <input type="text" name="disciplina" value="<?php echo $row['disciplina']; ?>" required>
        <label for="data_aula">Data da aula:</label>
        <input type="date" name="data_aula" value="<?php echo $row['data_aula']; ?>" required>
        <label for="horario">Horário:</label>
        <input type="time" name="horario" value="<?php echo $row['horario']; ?>" required>
        <input type="submit" value="Atualizar">
    </form>

</body>
</html>