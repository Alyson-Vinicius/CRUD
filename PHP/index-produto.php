<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Consulta todos os produtos da tabela
$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Lista de Produtos da Loja de Calçados</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="create-produto.php">Adicionar Produto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Produtos Disponíveis</h2>
        <!-- Verifica se há produtos na tabela -->
        <?php if (count($produtos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Tamanho</th>
                        <th>Cor</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop através dos produtos e exibe cada um em uma linha da tabela -->
                    <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto['nome']); ?></td>
                        <td><?= htmlspecialchars($produto['marca']); ?></td>
                        <td><?= htmlspecialchars($produto['tamanho']); ?></td>
                        <td><?= htmlspecialchars($produto['cor']); ?></td>
                        <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($produto['estoque']); ?></td>
                        <td>
                            <!-- Links para editar ou deletar o produto -->
                            <a href="edit-produto.php?id=<?= $produto['id']; ?>">Editar</a> | 
                            <a href="delete-produto.php?id=<?= $produto['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento da Loja de Calçados</p>
    </footer>
</body>
</html>
