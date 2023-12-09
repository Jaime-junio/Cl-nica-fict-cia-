
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Agendamento</h1>
    <form action="index.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone"><br><br>
        <label for="data">Data:</label>
        <input type="date" id="data" name="data"><br><br>
        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora"><br><br>
        <input type="submit" value="Agendar">
    </form>
   <?php 
        // Verificar se o formulário foi enviado
        if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['data']) && isset($_POST['hora'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            
            // Conexão ao banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "agenda";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Verificar se o usuário já existe no banco de dados
            $query = "SELECT * FROM agendados WHERE nome='$nome' AND email='$email'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                echo "<p>Já existe um registro com esses dados.</p>";
            } else {
                // Adicionar novo registro ao banco de dados
                $query = "INSERT INTO agendados (nome, email, telefone, data, hora) VALUES ('$nome', '$email', '$telefone', '$data', '$hora')";
                $conn->query($query);
                echo "<p>Registro adicionado com sucesso.</p>";
            }
            $conn->close();
        }
    ?>
</body>
</html>