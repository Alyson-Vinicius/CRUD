<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se o ID do produto foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepara a instrução SQL para excluir o produto
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    
    // Redireciona para a página de listagem de produtos após a exclusão
    header('Location: index-produto.php');
} else {
    die('ID de produto não fornecido.');
}
?>
