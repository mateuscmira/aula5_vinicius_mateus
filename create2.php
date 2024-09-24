<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $especialidade = $_POST['especialidade'];
    $data_contratacao = $_POST['data_contratacao'];

    $sql = "INSERT INTO Professores (nome, email, telefone, especialidade, data_contratacao) VALUES ('$nome', '$email', '$telefone', '$especialidade', '$data_contratacao')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro dos Professores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Cadastro de Professores</h1>
    <form action="create2.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br><br>
        <label for="telefone">Telefone:</label><br>
        <input type="number" id="telefone" name="telefone" required><br><br>
        <label for="especialidade">Especialidade:</label><br>
        <input type="text" id="especialidade" name="especialidade" required><br><br>
        <label for="data_contratacao">Data da contratação:</label><br>
        <input type="date" id="data_contratacao" name="data_contratacao" required><br><br>
        <input type="submit" value="Cadastrar Professor">
    </form>
    <a href="read2.php">Ver registros.</a>
    <br>
    <a href="index.html">Voltar para página inicial.</a>
</body>
</html>
