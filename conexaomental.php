    <!-- Conexão -->
<?php
$host = 'localhost';
$db = 'nome_do_banco'; // Substitua pelo nome do seu banco
$user = 'root'; // Ou o usuário do seu banco
$pass = ''; // Coloque a senha se tiver

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
