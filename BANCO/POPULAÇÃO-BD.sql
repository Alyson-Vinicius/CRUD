USE loja_calcados;

INSERT INTO usuarios (username, password) VALUES
('admin', '$2y$10$dMEM0XJ6xijr7r0G7OpYWOkNEjmJ.5Uvh0MJiS2GVmDZGoK8PMYD2'),
('vendedor1', '$2y$10$dMEM0XJ6xijr7r0G7OpYWOkNEjmJ.5Uvh0MJiS2GVmDZGoK8PMYD2');

-- Inserção de dados na tabela clientes
INSERT INTO clientes (nome, email, telefone, endereco) VALUES
('João Silva', 'joao.silva@email.com', '123456789', 'Rua A, 123, São Paulo'),
('Maria Oliveira', 'maria.oliveira@email.com', '987654321', 'Rua B, 456, São Paulo');

-- Inserção de dados na tabela produtos
INSERT INTO produtos (nome, marca, tamanho, cor, preco, estoque) VALUES
('Tênis Esportivo', 'Nike', 42, 'Preto', 299.90, 10),
('Sandália Casual', 'Havaianas', 40, 'Bege', 129.90, 20);

-- Inserção de dados na tabela vendas
INSERT INTO vendas (cliente_id, data_venda, total) VALUES
(1, '2024-09-10', 299.90),
(2, '2024-09-11', 129.90);

-- Inserção de dados na tabela itens_venda
INSERT INTO itens_venda (venda_id, produto_id, quantidade, preco_unitario) VALUES
(1, 1, 1, 299.90),  -- João comprou 1 par de Tênis Esportivo
(2, 2, 1, 129.90);  -- Maria comprou 1 Sandália Casual