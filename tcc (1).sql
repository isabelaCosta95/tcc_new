-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/11/2024 às 13:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(15) NOT NULL,
  `ativo` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `ativo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`, `ativo`) VALUES
(1, 'Laticínios', ''),
(5, 'Remédios', ''),
(6, 'Assados', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `codigo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ibge` char(7) NOT NULL,
  `excluido` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`codigo`, `estado`, `descricao`, `ibge`, `excluido`) VALUES
(1, 26, 'Presidente Prudente', '3541406', 'N'),
(2, 20, 'Niteroi', '3303302', 'N'),
(3, 14, 'Uberlandia', '3170206', 'N'),
(4, 17, 'Curitiba', '4106902', 'N'),
(5, 22, 'Porto Alegre', '4314902', 'N'),
(6, 6, 'Salvador', '2927408', 'N'),
(7, 18, 'Recife', '2611606', 'N'),
(8, 25, 'Florianopolis', '4205407', 'N'),
(9, 5, 'Manaus', '1302603', 'N'),
(10, 10, 'Goiania', '5208707', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
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
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `razao_social`, `nome_fantasia`, `cnpj_cpf`, `inscricao_estadual`, `endereco`, `bairro`, `complemento`, `numero`, `cidade`, `estado`, `telefone1`, `telefone2`, `observacao`, `ativo`, `email`) VALUES
(4, 'Amone', '', '', '', '', '', '', '', NULL, NULL, '', '', '', 'S', NULL),
(9, 'Sebo Prudente', 'Livraria Sebo', '458.896.369-80', '458.966.987.54', 'centro', 'Jd. Tereza', '', '200', 1, 26, '', '', '', '1', 'sebo@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_pagar`
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
-- Despejando dados para a tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `dt_vencimento`, `valor`, `stts`, `dt_pagamento`, `form_pagamento`, `plano_contas`, `observacao`, `qnt_parcelas`, `cliente`) VALUES
(1, 'Conta 1 teste', '2024-10-10', 100, 'P', '2024-10-10', 'Dinheiro', 1, '-', 1, 0),
(2, 'Conta teste valor', '2024-11-17', 0, 'A', '2024-11-17', '', 1, '', 2, 4),
(3, 'Teste inserir valor novamente', '2024-11-01', 1500, '', '2024-11-17', '', 15, '', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado`
--

CREATE TABLE `estado` (
  `codigo` int(11) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `codigo_uf` varchar(2) DEFAULT NULL,
  `excluido` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estado`
--

INSERT INTO `estado` (`codigo`, `sigla`, `descricao`, `codigo_uf`, `excluido`) VALUES
(2, 'AC', 'Acre', '12', 'N'),
(3, 'AL', 'Alagoas', '27', 'N'),
(4, 'AP', 'Amapa', '16', 'N'),
(5, 'AM', 'Amazonas', '13', 'N'),
(6, 'BA', 'Bahia', '29', 'N'),
(7, 'CE', 'Ceara', '23', 'N'),
(8, 'DF', 'Distrito Federal', '53', 'N'),
(9, 'ES', 'Espirito Santo', '32', 'N'),
(10, 'GO', 'Goias', '52', 'N'),
(11, 'MA', 'Maranhao', '21', 'N'),
(12, 'MT', 'Mato Grosso', '51', 'N'),
(13, 'MS', 'Mato Grosso do Sul', '50', 'N'),
(14, 'MG', 'Minas Gerais', '31', 'N'),
(15, 'PA', 'Para', '15', 'N'),
(16, 'PB', 'Paraiba', '25', 'N'),
(17, 'PR', 'Parana', '41', 'N'),
(18, 'PE', 'Pernambuco', '26', 'N'),
(19, 'PI', 'Piaui', '22', 'N'),
(20, 'RJ', 'Rio de Janeiro', '33', 'N'),
(21, 'RN', 'Rio Grande do Norte', '24', 'N'),
(22, 'RS', 'Rio Grande do Sul', '43', 'N'),
(23, 'RO', 'Rondonia', '11', 'N'),
(24, 'RR', 'Roraima', '14', 'N'),
(25, 'SC', 'Santa Catarina', '42', 'N'),
(26, 'SP', 'Sao Paulo', '35', 'N'),
(27, 'SE', 'Sergipe', '28', 'N'),
(28, 'TO', 'Tocantins', '17', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `forma_pagamento`
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
-- Estrutura para tabela `plano_conta`
--

CREATE TABLE `plano_conta` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `plano_conta`
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
-- Estrutura para tabela `produto`
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
  `id_fornecedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `id_categoria`, `marca`, `descricao`, `observacao`, `estoque`, `preco`, `unidade`, `validade`, `ativo`, `usuario`, `ncm`, `cfop`, `pis`, `cofins`, `icms_cst`, `aliquota_pis`, `aliquota_cofins`, `aliquota_icms`, `ipi`, `aliquota_reducao_bc`, `origem_icms`, `cest`, `gtin`, `aliquota_mva`, `codigo_barras`, `id_fornecedor`) VALUES
(3, 1, NULL, 'vela', NULL, 0.00, 45.00, NULL, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `codigo` int(11) NOT NULL,
  `abreviacao` varchar(2) DEFAULT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
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
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `cargo`, `ativo`) VALUES
(1, 'ISABELA COSTA', 'isabela', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `codigo` int(11) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `rntc` varchar(30) DEFAULT NULL,
  `cor` varchar(10) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fornecedor_cidade` (`cidade`),
  ADD KEY `fk_fornecedor_estado` (`estado`);

--
-- Índices de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `plano_conta`
--
ALTER TABLE `plano_conta`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_codigo_categoria` (`id_categoria`),
  ADD KEY `fk_codigo_unidade` (`unidade`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_veiculo_estado` (`estado`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_fornecedor_cidade` FOREIGN KEY (`cidade`) REFERENCES `cidade` (`codigo`),
  ADD CONSTRAINT `fk_fornecedor_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`codigo`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_codigo_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `fk_codigo_unidade` FOREIGN KEY (`unidade`) REFERENCES `unidade` (`codigo`),
  ADD CONSTRAINT `fk_codigo_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `fk_veiculo_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
