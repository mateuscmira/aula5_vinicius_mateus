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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $especialidade = $_POST['especialidade'];
        $data_contratacao = $_POST['data_contratacao'];
    
        $sql = "INSERT INTO Professores (nome, email, telefone, especialidade, data_contratacao) 
                VALUES ('$nome', '$email', '$telefone', '$especialidade', '$data_contratacao')";
    
        if ($conn->query($sql) === TRUE) {
            $mensagem = "Novo professor registrado com sucesso!";
        } else {
            $mensagem = "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $sql = "SELECT * FROM Professores";
    $result = $conn->query($sql);

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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professores</title>
</head>

<body>
    <h1>Cadastro de Professores</h1>

    <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>

    <form action="professores.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone"><br><br>
        
        <label for="especialidade">Especialidade:</label><br>
        <input type="text" id="especialidade" name="especialidade"><br><br>
        
        <label for="data_contratacao">Data de Contratação:</label><br>
        <input type="date" id="data_contratacao" name="data_contratacao" required><br><br>
        
        <input type="submit" value="Cadastrar Professor">
    </form>

    <h2>Lista de Professores</h2>
    <?php
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
</body>

</html>