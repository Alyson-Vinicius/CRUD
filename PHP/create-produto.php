<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    
    // Prepara a instrução SQL para inserir um novo produto no banco de dados
    $stmt = $pdo->prepare("INSERT INTO produtos (nome, marca, tamanho, cor, preco, estoque) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Executa a instrução SQL com os dados do formulário
    $stmt->execute([$nome, $marca, $tamanho, $cor, $preco, $estoque]);
    
    // Redireciona para a página de listagem de produtos após a inserção
    header('Location: index-produto.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Adicionar Novo Produto - Loja de Calçados</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-produto.php">Listar Produtos</a></li>
                <li><a href="create-produto.php">Adicionar Produto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar Produto</h2>
        <!-- Formulário para adicionar um novo produto -->
        <form method="POST">
            <label for="nome">Nome:</label>
            <!-- Campo para inserir o nome do produto -->
            <input type="text" id="nome" name="nome" required>
            
            <label for="marca">Marca:</label>
            <!-- Campo para inserir a marca do produto -->
            <input type="text" id="marca" name="marca" required>
            
            <label for="tamanho">Tamanho:</label>
            <!-- Campo para inserir o tamanho do calçado -->
            <input type="number" id="tamanho" name="tamanho" required>
            
            <label for="cor">Cor:</label>
            <!-- Campo para inserir a cor do calçado -->
            <input type="text" id="cor" name="cor" required>
            
            <label for="preco">Preço:</label>
            <!-- Campo para inserir o preço do calçado -->
            <input type="number" step="0.01" id="preco" name="preco" required>
            
            <label for="estoque">Estoque:</label>
            <!-- Campo para inserir a quantidade em estoque -->
            <input type="number" id="estoque" name="estoque" required>
            
            <!-- Botão para submeter o formulário -->
            <button type="submit">Adicionar Produto</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Loja de Calçados</p>
    </footer>
</body>
</html>
