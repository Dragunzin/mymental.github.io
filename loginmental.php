   <!--Login -->
    <?php
    require 'conexao.php';
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        session_start();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        echo "Login realizado com sucesso!";
        // Redirecionar para a área logada
    } else {
        echo "E-mail ou senha inválidos.";
    }
    echo "<script>alert('Senha incorreta'); window.location.href='mymental.html';</script>";

    ?>
    