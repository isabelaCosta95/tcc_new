-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Nov-2024 às 00:25
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(15) NOT NULL,
  `ativo` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`) VALUES
(1, 'Laticínios'),
(5, 'Remédios'),
(6, 'teste maria'),
(7, 'Frios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ibge` char(7) NOT NULL,
  `excluido` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(150) NOT NULL,
  `nome_fantasia` varchar(150) NOT NULL,
  `cnpj_cpf` varchar(18) NOT NULL,
  `inscricao_estadual` varchar(15) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cidade` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) NOT NULL,
  `observacao` varchar(50) NOT NULL,
  `ativo` char(1) DEFAULT 'S',
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `razao_social`, `nome_fantasia`, `cnpj_cpf`, `inscricao_estadual`, `endereco`, `bairro`, `complemento`, `numero`, `cidade`, `estado`, `telefone1`, `telefone2`, `observacao`, `ativo`, `email`) VALUES
(4, 'Amone', 'Amone', '', '', '', '', '', '', NULL, NULL, '', '', '', 'S', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dt_vencimento` date NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `stts` varchar(1) NOT NULL,
  `dt_pagamento` date NOT NULL,
  `form_pagamento` varchar(20) NOT NULL,
  `plano_contas` int(11) NOT NULL,
  `observacao` varchar(255) NOT NULL,
  `qnt_parcelas` int(3) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `dt_vencimento`, `valor`, `stts`, `dt_pagamento`, `form_pagamento`, `plano_contas`, `observacao`, `qnt_parcelas`, `cliente`) VALUES
(1, 'Conta 1 teste', '2024-10-10', '100', 'P', '2024-10-10', 'Dinheiro', 1, '-', 1, 0),
(2, 'Conta teste valor', '2024-11-17', '0', 'A', '2024-11-17', '', 1, '', 2, 4),
(3, 'Teste inserir valor novamente', '2024-11-01', '1500', '', '2024-11-17', '', 15, '', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `codigo_uf` varchar(2) DEFAULT NULL,
  `excluido` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `sigla`, `descricao`, `codigo_uf`, `excluido`) VALUES
(4, 'RJ', 'Rio de Janeiro', '33', 'N'),
(5, 'MG', 'Minas Gerais', '31', 'N'),
(9, 'SP', 'Sao Paulo', '35', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id`, `descricao`) VALUES
(1, 'Dinheiro'),
(2, 'Cartão de Crédito'),
(3, 'Cartão de Débito'),
(4, 'Pix'),
(5, 'Transferência Bancária'),
(6, 'Boleto Bancário'),
(7, 'Cheque'),
(8, 'Vale Alimentação'),
(9, 'Vale Refeição'),
(10, 'Crédito na Loja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano_conta`
--

CREATE TABLE `plano_conta` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `plano_conta`
--

INSERT INTO `plano_conta` (`id`, `descricao`) VALUES
(1, 'Despesas Operacionais'),
(2, 'Despesas com Pessoal'),
(3, 'Despesas de Marketing'),
(4, 'Despesas Administrativas'),
(5, 'Despesas Financeiras'),
(6, 'Despesas Tributárias'),
(7, 'Receitas Operacionais'),
(8, 'Receitas de Vendas'),
(9, 'Receitas Financeiras'),
(10, 'Receitas de Investimentos'),
(11, 'Ativo Circulante'),
(12, 'Ativo Não Circulante'),
(13, 'Passivo Circulante'),
(14, 'Passivo Não Circulante'),
(15, 'Patrimônio Líquido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `descricao` varchar(100) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `estoque` decimal(10,2) DEFAULT 0.00,
  `preco` decimal(10,2) DEFAULT 0.00,
  `unidade` int(11) DEFAULT NULL,
  `validade` int(10) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT 'S',
  `usuario` int(11) DEFAULT NULL,
  `ncm` varchar(9) DEFAULT NULL,
  `cfop` varchar(4) DEFAULT NULL,
  `pis` varchar(5) DEFAULT NULL,
  `cofins` varchar(8) DEFAULT NULL,
  `icms_cst` varchar(3) DEFAULT NULL,
  `aliquota_pis` decimal(5,2) DEFAULT NULL,
  `aliquota_cofins` decimal(5,2) DEFAULT NULL,
  `aliquota_icms` decimal(5,2) DEFAULT NULL,
  `ipi` decimal(5,2) DEFAULT NULL,
  `aliquota_reducao_bc` decimal(5,2) DEFAULT NULL,
  `origem_icms` varchar(2) DEFAULT NULL,
  `cest` varchar(7) DEFAULT NULL,
  `gtin` varchar(20) DEFAULT NULL,
  `aliquota_mva` decimal(10,2) DEFAULT 0.00,
  `codigo_barras` varchar(13) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `id_categoria`, `marca`, `descricao`, `observacao`, `estoque`, `preco`, `unidade`, `validade`, `ativo`, `usuario`, `ncm`, `cfop`, `pis`, `cofins`, `icms_cst`, `aliquota_pis`, `aliquota_cofins`, `aliquota_icms`, `ipi`, `aliquota_reducao_bc`, `origem_icms`, `cest`, `gtin`, `aliquota_mva`, `codigo_barras`, `id_cliente`) VALUES
(2, 5, NULL, 'Xarope', NULL, '0.00', '50.00', NULL, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, 4),
(3, 6, NULL, 'Creme de Leite', NULL, '0.00', '3.00', NULL, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, 4),
(4, 7, NULL, 'Queijo', NULL, '0.00', '22.50', NULL, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `codigo` int(11) NOT NULL,
  `abreviacao` varchar(2) DEFAULT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `cargo` int(11) NOT NULL,
  `ativo` char(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `cargo`, `ativo`) VALUES
(1, 'ISABELA COSTA', 'isabela', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `nome_prop` varchar(250) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `renavam` varchar(30) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `rntc` varchar(30) DEFAULT NULL,
  `cor` varchar(10) DEFAULT NULL,
  `marca_modelo` varchar(30) NOT NULL,
  `chassi` varchar(50) NOT NULL,
  `combustivel` varchar(10) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `pot_cilindrada` varchar(15) NOT NULL,
  `motor` varchar(20) NOT NULL,
  `carroceria` varchar(30) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `nome_prop`, `placa`, `renavam`, `estado`, `rntc`, `cor`, `marca_modelo`, `chassi`, `combustivel`, `categoria`, `pot_cilindrada`, `motor`, `carroceria`, `observacao`, `ativo`) VALUES
(3, 'Maria Clara', 'FIA9567', '44444', 4, '0025032004', 'Vermelha', 'Yamaha - NEO', '4444444', 'Gasolina', 'A', '0', '1', 'NÃO', '', 'S'),
(5, 'Matheus Alves', 'MAR-2503', '8888', 9, '777', 'Vermelho', 'Honda - 160', '5555', 'Flex', 'A', '160', '1', 'NÃO', '', 'S'),
(7, 'Antonio Brum', 'CEL-1967', '9999gg', 4, '8888', 'Preto', 'Honda - Fan 125', '999', 'Gasolina', 'A', '125', '1', 'NÃO', '', ''),
(8, 'Silmara Assencio', 'SIL-8973', '9999', 9, '7777', 'Prata', 'Clio', '8796524655', 'Etanol/Gas', 'B', '1', '1', 'NÃO', '', 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado` (`estado`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fornecedor_cidade` (`cidade`),
  ADD KEY `fk_fornecedor_estado` (`estado`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `plano_conta`
--
ALTER TABLE `plano_conta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_codigo_categoria` (`id_categoria`),
  ADD KEY `fk_codigo_unidade` (`unidade`),
  ADD KEY `fk_codigo_usuario` (`usuario`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_veiculo_estado` (`estado`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `plano_conta`
--
ALTER TABLE `plano_conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_fornecedor_cidade` FOREIGN KEY (`cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `fk_fornecedor_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `fk_codigo_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `fk_codigo_unidade` FOREIGN KEY (`unidade`) REFERENCES `unidade` (`codigo`),
  ADD CONSTRAINT `fk_codigo_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `fk_veiculo_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
