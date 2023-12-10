
<?php 
        // Verificar se o formulário foi enviado
        if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['data']) && isset($_POST['hora'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            
            $servername = "localhost";
$username = "root";
$password = "";

$servico_escolhido = $_POST['servico'];

// Conectar ao banco de dados específico para o serviço escolhido
switch ($servico_escolhido) {
  case 'consulta_medica':
    $dbname = "banco_consulta_medica";
    break;
  case 'exames_rotina':
    $dbname = "banco_exames_rotina";
    break;
  case 'exames_imagem':
    $dbname = "banco_exames_imagem";
    break;
  case 'laboratorio_clinico':
    $dbname = "banco_laboratorio_clinico";
    break;
  case 'servicos_reabilitacao':
    $dbname = "banco_servicos_reabilitacao";
    break;
  default:
    die("Serviço desconhecido");
}

// Estabelecer conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Processar os campos do formulário e inserir no banco de dados
/*$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
*/

// Exemplo de inserção de dados no banco de dados
/*$sql = "INSERT INTO tabela_servico (nome, email) VALUES ('$nome', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "Dados inseridos com sucesso!";
} else {
  echo "Erro na inserção de dados: " . $conn->error;
}*/

$query = "SELECT * FROM clientes WHERE nome='$nome' AND email='$email'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<p>Já existe um registro com esses dados.</p>";
} else {
    // Adicionar novo registro ao banco de dados
    $query = "INSERT INTO clientes (nome, email, telefone, datas, horas) VALUES ('$nome', '$email', '$telefone', '$data', '$hora')";
    $conn->query($query);
    echo "<p>Registro adicionado com sucesso.</p>";
}

// Fechar a conexão com o banco de dados
$conn->close();

        }


    ?>
