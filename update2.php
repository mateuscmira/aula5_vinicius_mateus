<?php
    include 'db.php';

    $id_professores = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $especialidade = $_POST['especialidade'];
        $data_contratacao = $_POST['data_contratacao'];

        $sql = "UPDATE professores SET nome='$nome', email='$email', telefone ='$telefone', especialidade ='$especialidade', data_contratacao='$data_contratacao' WHERE id_professores=$id_professores";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn ->close();
        header ("Location: read2.php");
        exit();
    }

    $sql = "SELECT * FROM Professores WHERE id_professores=$id_professores";
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
    
    <form method="POST" action=" update2.php?id=<?php echo $row['id_professores'];?>">
        <label for="Nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
        <label for="telefone">Telefone:</label>
        <input type="number" name="telefone" value="<?php echo $row['telefone']; ?>" required>
        <label for="especialidade">Especialidade:</label>
        <input type="text" name="especialidade" value="<?php echo $row['especialidade']; ?>" required>
        <label for="data_contratacao">Data da contratação:</label>
        <input type="date" name="data_contratacao" value="<?php echo $row['data_contratacao']; ?>" required>
        <input type="submit" value="Atualizar">
    </form>

</body>
</html>