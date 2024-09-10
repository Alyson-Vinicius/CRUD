<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se o ID do produto foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Busca os dados do produto no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verifica se o produto foi encontrado
    if (!$produto) {
        die('Produto não encontrado.');
    }
} else {
    die('ID de produto não fornecido.');
}

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    
    // Atualiza o produto no banco de dados
    $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, marca = ?, tamanho = ?, cor = ?, preco = ?, estoque = ? WHERE id = ?");
    $stmt->execute([$nome, $marca, $tamanho, $cor, $preco, $estoque, $id]);
    
    // Redireciona para a página de listagem de produtos
    header('Location: index-produto.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Produto</h1>
        <nav>
            <ul>
                <li><a href="index-produto.php">Listar Produtos</a></li>
                <li><a href="create-produto.php">Adicionar Produto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Produto</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']); ?>" required>
            
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" value="<?= htmlspecialchars($produto['marca']); ?>" required>
            
            <label for="tamanho">Tamanho:</label>
            <input type="number" id="tamanho" name="tamanho" value="<?= htmlspecialchars($produto['tamanho']); ?>" required>
            
            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" value="<?= htmlspecialchars($produto['cor']); ?>" required>
            
            <label for="preco">Preço:</label>
            <input type="number" step="0.01" id="preco" name="preco" value="<?= htmlspecialchars($produto['preco']); ?>" required>
            
            <label for="estoque">Estoque:</label>
            <input type="number" id="estoque" name="estoque" value="<?= htmlspecialchars($produto['estoque']); ?>" required>
            
            <button type="submit">Salvar Alterações</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento da Loja de Calçados</p>
    </footer>
</body>
</html>
