<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once 'db.php';

    // Obtém o ID do cliente a partir da URL usando o método GET
    $id = $_GET['id'];

    // Prepara a instrução SQL para selecionar o cliente pelo ID
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
    // Executa a instrução SQL, passando o ID do cliente como parâmetro
    $stmt->execute([$id]);

    // Recupera os dados do cliente como um array associativo
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Clientes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-clientes.php">Listar Clientes</a></li>
                <li><a href="create-cliente.php">Adicionar Cliente</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes do Cliente</h2>
        <?php if ($cliente): ?>
            <!-- Exibe os detalhes do cliente -->
            <p><strong>ID:</strong> <?= htmlspecialchars($cliente['id']) ?></p>
            <p><strong>Nome:</strong> <?= htmlspecialchars($cliente['nome']) ?></p>
            <p><strong>E-mail:</strong> <?= htmlspecialchars($cliente['email']) ?></p>
            <p><strong>Telefone:</strong> <?= htmlspecialchars($cliente['telefone']) ?></p>
            <p><strong>Endereço:</strong> <?= htmlspecialchars($cliente['endereco']) ?></p>
            <p>
                <!-- Links para editar e excluir o cliente -->
                <a href="update-cliente.php?id=<?= htmlspecialchars($cliente['id']) ?>">Editar</a>
                <a href="delete-cliente.php?id=<?= htmlspecialchars($cliente['id']) ?>">Excluir</a>
            </p>
        <?php else: ?>
            <!-- Exibe uma mensagem caso o cliente não seja encontrado -->
            <p>Cliente não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Clientes</p>
    </footer>
</body>
</html>
