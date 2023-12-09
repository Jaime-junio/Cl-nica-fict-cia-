
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
                $query = "INSERT INTO agendados (nome, email, telefone, datas, horas) VALUES ('$nome', '$email', '$telefone', '$data', '$hora')";
                $conn->query($query);
                echo "<p>Registro adicionado com sucesso.</p>";
            }
            $conn->close();
        }
    ?>
