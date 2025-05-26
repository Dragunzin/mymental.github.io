  <!-- CADASTRO -->
<?php
require 'conexao.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha
    ]);
    echo "Cadastro realizado com sucesso!";
    // Redirecionar ou iniciar sessão
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "Este e-mail já está cadastrado.";
    } else {
        echo "Erro: " . $e->getMessage();
    }
}
?>
