-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2024 às 14:23
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
-- Estrutura para tabela `carga`
--

CREATE TABLE `carga` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `id_seguradora` int(11) NOT NULL,
  `quantidade` decimal(10,0) NOT NULL,
  `valor_total` decimal(10,0) NOT NULL,
  `nmr_seguro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carga`
--

INSERT INTO `carga` (`id`, `descricao`, `id_produto`, `id_cliente`, `status`, `id_seguradora`, `quantidade`, `valor_total`, `nmr_seguro`) VALUES
(1, 'primeira carga', 3, 4, '', 1, 10, 45, '15'),
(2, 'segunda carga', 3, 4, '', 1, 10, 45, '15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargo`
--

INSERT INTO `cargo` (`id`, `descricao`, `nome`) VALUES
(4, 'Gerenciar a equipe administrativo', 'Gerente Administrativa');

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
(1, 'Laticínios - Vaca', 'N'),
(5, 'Remédio', 'S'),
(6, 'Assados', 'N'),
(7, 'Bovino', 'N'),
(8, 'Congelados', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ibge` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`id`, `id_estado`, `descricao`, `ibge`) VALUES
(1, 26, 'Presidente Prudente', '3541406'),
(2, 19, 'Niteroi', '3303307'),
(3, 14, 'Uberlandia', '3170206'),
(4, 17, 'Curitiba', '4106902'),
(5, 22, 'Porto Alegre', '4314902'),
(6, 6, 'Salvador', '2927408'),
(7, 18, 'Recife', '2611606'),
(8, 25, 'Florianopolis', '4205407'),
(9, 5, 'Manaus', '1302603'),
(10, 10, 'Goiania', '5208707'),
(11, 26, 'Presidente Venceslau', '4528');

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
  `id_cidade` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) NOT NULL,
  `observacao` varchar(50) NOT NULL,
  `ativo` char(1) DEFAULT 'S',
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `razao_social`, `nome_fantasia`, `cnpj_cpf`, `inscricao_estadual`, `endereco`, `bairro`, `complemento`, `numero`, `id_cidade`, `id_estado`, `telefone1`, `telefone2`, `observacao`, `ativo`, `email`) VALUES
(4, 'Amone', '', '', '', '', '', '', '', NULL, NULL, '', '', '', 'S', NULL),
(11, 'Isabela Oliveira Vieira Costa', 'Isa Costa', '430.286.618-70', '123', 'Jeônimo Garcia Duarte', 'Jd. Tereza', '', '1135', 1, 26, '(18) 99630-942', '', '', 'S', 'isabelaovc95@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dt_vencimento` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
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
(1, 'Conta 1 teste', '2024-10-10', 100.00, 'P', '2024-10-10', 'Dinheiro', 1, '-', 1, 0),
(2, 'Conta teste valor - alterar', '2024-11-20', 1.59, 'C', '2024-11-02', '10', 15, 'TESTE OBSERVAÇÃO', 3, 9),
(3, 'Teste inserir valor novamente', '2024-11-01', 1500.00, '', '2024-11-17', '', 15, '', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
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
-- Despejando dados para a tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `descricao`, `dt_vencimento`, `valor`, `stts`, `dt_pagamento`, `form_pagamento`, `plano_contas`, `observacao`, `qnt_parcelas`, `cliente`) VALUES
(1, 'Pagamento de Serviço', '2024-12-10', 1500, 'P', '2024-12-12', 'Cartão de Crédito', 101, 'Serviço realizado em novembro', 1, 5),
(2, 'Venda de Produto', '2024-12-15', 300, 'A', '0000-00-00', 'Boleto Bancário', 102, 'Parcelado em 3x', 3, 8),
(3, 'Assinatura Mensal', '2024-12-05', 100, 'P', '2024-12-06', 'Pix', 103, 'Referente ao mês de dezembro', 1, 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(200) NOT NULL,
  `nome_fantasia` varchar(150) NOT NULL,
  `inscricao_estadual` varchar(15) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `inscricao_municipal` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id`, `razao_social`, `nome_fantasia`, `inscricao_estadual`, `cnpj`, `inscricao_municipal`, `telefone`, `endereco`, `numero`, `bairro`, `complemento`, `id_cidade`, `id_estado`, `email`) VALUES
(1, 'Empresa Teste', 'Empresa Teste', '123', '123', '123', '123', 'Jeônimo Garcia Duarte', '1135', 'Jd. Tereza', 'teste', 1, 14, 'empresa teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `codigo_uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estado`
--

INSERT INTO `estado` (`id`, `sigla`, `descricao`, `codigo_uf`) VALUES
(2, 'AC', 'Acre', '12'),
(3, 'AL', 'Alagoas', '27'),
(4, 'AP', 'Amapa', '16'),
(5, 'AM', 'Amazonas', '13'),
(6, 'BA', 'Bahia', '29'),
(7, 'CE', 'Ceara', '23'),
(8, 'DF', 'Distrito Federal', '53'),
(9, 'ES', 'Espirito Santo', '32'),
(10, 'GO', 'Goias', '52'),
(11, 'MA', 'Maranhao', '21'),
(12, 'MT', 'Mato Grosso', '51'),
(13, 'MS', 'Mato Grosso do Sul', '50'),
(14, 'MG', 'Minas Gerais', '31'),
(15, 'PA', 'Para', '15'),
(16, 'PB', 'Paraiba', '25'),
(17, 'PR', 'Parana', '41'),
(18, 'PE', 'Pernambuco', '26'),
(19, 'PI', 'Piaui', '22'),
(20, 'RJ', 'Rio de Janeiro', '33'),
(21, 'RN', 'Rio Grande do Norte', '24'),
(22, 'RS', 'Rio Grande do Sul', '43'),
(23, 'RO', 'Rondonia', '11'),
(24, 'RR', 'Roraima', '14'),
(25, 'SC', 'Santa Catarina', '42'),
(26, 'SP', 'Sao Paulo', '35'),
(27, 'SE', 'Sergipe', '28'),
(28, 'TO', 'Tocantins', '17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ativo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id`, `descricao`, `ativo`) VALUES
(1, 'Dinheiri', 'S'),
(2, 'Cartão de Crédito', 'S'),
(3, 'Cartão de Débito', ''),
(4, 'Pix', ''),
(5, 'Transferência Bancária', ''),
(6, 'Boleto Bancário', ''),
(7, 'Cheque isabela', 'S'),
(8, 'Vale Alimentação', ''),
(9, 'Vale Refeição', ''),
(10, 'Crédito na Loja', ''),
(11, 'Cartão de Crédito Isabela', 'S'),
(12, 'isabela', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `cpf` varchar(18) NOT NULL,
  `cnh` varchar(25) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `rg` varchar(20) NOT NULL,
  `dt_venc_cnh` date NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `chave_pix` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `ativo` char(1) NOT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome_completo`, `cpf`, `cnh`, `dt_nascimento`, `rg`, `dt_venc_cnh`, `endereco`, `bairro`, `numero`, `complemento`, `id_estado`, `id_cidade`, `telefone`, `chave_pix`, `email`, `ativo`, `observacao`) VALUES
(3, 'isabela oliveira vieira costa', '430.286.618-70', '125', '2024-12-02', '456', '2024-12-02', 'Jeônimo Garcia Duarte', 'Vila Santa Tereza', '1135', '', 3, 1, '(18) 99630-9423', '18996309423', 'isabelaovc95@gmail.com', 'S', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `manutencao`
--

CREATE TABLE `manutencao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `km_atual` decimal(10,0) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `valor_maodeobra` decimal(10,0) NOT NULL,
  `valor_total` decimal(10,0) NOT NULL,
  `responsavel` char(1) NOT NULL,
  `id_responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `palete`
--

CREATE TABLE `palete` (
  `id` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `quantidade` decimal(10,0) NOT NULL,
  `justificativa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `palete`
--

INSERT INTO `palete` (`id`, `tipo`, `quantidade`, `justificativa`) VALUES
(1, 'E', 15, 'entrada teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `parada`
--

CREATE TABLE `parada` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `id_viagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `peca`
--

CREATE TABLE `peca` (
  `descricao` varchar(150) NOT NULL,
  `id` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `peca`
--

INSERT INTO `peca` (`descricao`, `id`, `ativo`, `observacao`) VALUES
('vela', 1, '', ''),
('volantee', 2, 'N', 'Volante Elétricoo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `plano_conta`
--

CREATE TABLE `plano_conta` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ativo` char(1) NOT NULL,
  `natureza` char(1) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `plano_conta`
--

INSERT INTO `plano_conta` (`id`, `descricao`, `ativo`, `natureza`, `tipo`, `observacao`) VALUES
(1, 'Despesas Operacionais', '0', '', '', '0'),
(2, 'Despesas com Pessoal', '0', '', '', '0'),
(3, 'Despesas de Marketing', '0', '', '', '0'),
(4, 'Despesas Administrativas', '0', '', '', '0'),
(5, 'Despesas Financeiras', '0', '', '', '0'),
(6, 'Despesas Tributárias', '0', '', '', '0'),
(7, 'Receitas Operacionais', '0', '', '', '0'),
(8, 'Receitas de Vendas', '0', '', '', '0'),
(9, 'Receitas Financeiras', '0', '', '', '0'),
(10, 'Receitas de Investimentos', '0', '', '', '0'),
(11, 'Ativo Circulante', '0', '', '', '0'),
(12, 'Ativo Não Circulante', '0', '', '', '0'),
(13, 'Passivo Circulante', '0', '', '', '0'),
(14, 'Passivo Não Circulante', '0', '', '', '0'),
(15, 'Patrimônio Líquido', '0', '', '', '0'),
(16, 'Plano testee', 'N', 'D', 'R', '-e');

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
  `codigo_barras` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `id_categoria`, `marca`, `descricao`, `observacao`, `estoque`, `preco`, `unidade`, `validade`, `ativo`, `ncm`, `cfop`, `pis`, `cofins`, `icms_cst`, `aliquota_pis`, `aliquota_cofins`, `aliquota_icms`, `ipi`, `aliquota_reducao_bc`, `origem_icms`, `cest`, `gtin`, `aliquota_mva`, `codigo_barras`) VALUES
(3, 1, NULL, 'vela', NULL, 0.00, 45.00, NULL, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL),
(6, 1, 'marca teste', 'produto teste', '15', 14.00, 1.00, 1, 1, 'S', '2', '3', '4', '5', '11', 12.00, 13.00, 6.00, 17.00, NULL, '9', '7', '8', 10.00, '1'),
(7, 5, 'Marca melhor', 'Produto alterado - isabela', '105', 104.00, 150.00, 5, 100, 'S', '200', '300', '400', '500', '110', 999.99, 10.00, 600.00, 999.99, 2.00, '90', '700', '800', 1000.00, '17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `seguradora`
--

CREATE TABLE `seguradora` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `inscricao_estadual` varchar(20) NOT NULL,
  `contato` varchar(15) NOT NULL,
  `telefone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `seguradora`
--

INSERT INTO `seguradora` (`id`, `nome`, `cnpj`, `email`, `inscricao_estadual`, `contato`, `telefone`) VALUES
(1, 'Seguradora ABC', '12.345.678/0001-90', 'contato@seguradoraabc.com', '123456789', 'João Silva', '(11) 98765-432'),
(2, 'nome', 'cnpj', 'email', 'ins', 'cont', 'tel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade_venda`
--

CREATE TABLE `unidade_venda` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `abreviacao` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `unidade_venda`
--

INSERT INTO `unidade_venda` (`id`, `descricao`, `abreviacao`) VALUES
(1, 'Unidade', 'UN'),
(2, 'Caixa', 'CX'),
(3, 'Pacote', 'PT'),
(4, 'Litro', 'LT'),
(5, 'Metro', 'MT'),
(6, 'Quilograma', 'KG'),
(7, 'Tonelada', 'TO'),
(8, 'Galão', 'GL'),
(9, 'Barril', 'BL');

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
  `id` int(11) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `nome_proprietario` varchar(100) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `cor` varchar(10) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `renavam` varchar(15) DEFAULT NULL,
  `rntc` varchar(20) NOT NULL,
  `chassi` varchar(20) NOT NULL,
  `combustivel` varchar(20) NOT NULL,
  `dt_fabricacao` date NOT NULL,
  `dt_licenciamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `placa`, `nome_proprietario`, `marca`, `cor`, `observacao`, `renavam`, `rntc`, `chassi`, `combustivel`, `dt_fabricacao`, `dt_licenciamento`) VALUES
(1, 'placa', 'nome', 'marca', 'cor', NULL, 'ren', 'rntc', 'chassi', 'comb', '2012-01-01', '2004-04-07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `viagem`
--

CREATE TABLE `viagem` (
  `id` int(11) NOT NULL,
  `id_carga` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `endereco_partida` varchar(255) NOT NULL,
  `endereco_chegada` varchar(255) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `observacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carga_cliente` (`id_cliente`),
  ADD KEY `fk_carga_produto` (`id_produto`),
  ADD KEY `fk_carga_seguradora` (`id_seguradora`);

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cidade_estado` (`id_estado`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cidade` (`id_cidade`),
  ADD KEY `fk_cliente_estado` (`id_estado`);

--
-- Índices de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionario_estado` (`id_estado`),
  ADD KEY `fk_funcionario_cidade` (`id_cidade`);

--
-- Índices de tabela `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_manutencao_veiculo` (`id_veiculo`);

--
-- Índices de tabela `palete`
--
ALTER TABLE `palete`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `parada`
--
ALTER TABLE `parada`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `peca`
--
ALTER TABLE `peca`
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
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `seguradora`
--
ALTER TABLE `seguradora`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `unidade_venda`
--
ALTER TABLE `unidade_venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `viagem`
--
ALTER TABLE `viagem`
  ADD KEY `fk_viagem_carga` (`id_carga`),
  ADD KEY `fk_viagem_funcionario` (`id_funcionario`),
  ADD KEY `fk_viagem_veiculo` (`id_veiculo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carga`
--
ALTER TABLE `carga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `manutencao`
--
ALTER TABLE `manutencao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `palete`
--
ALTER TABLE `palete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `parada`
--
ALTER TABLE `parada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `peca`
--
ALTER TABLE `peca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `plano_conta`
--
ALTER TABLE `plano_conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `seguradora`
--
ALTER TABLE `seguradora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `unidade_venda`
--
ALTER TABLE `unidade_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `fk_carga_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `fk_carga_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `fk_carga_seguradora` FOREIGN KEY (`id_seguradora`) REFERENCES `seguradora` (`id`);

--
-- Restrições para tabelas `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `fk_cliente_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Restrições para tabelas `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `id_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `fk_funcionario_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Restrições para tabelas `manutencao`
--
ALTER TABLE `manutencao`
  ADD CONSTRAINT `fk_manutencao_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_codigo_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Restrições para tabelas `viagem`
--
ALTER TABLE `viagem`
  ADD CONSTRAINT `fk_viagem_carga` FOREIGN KEY (`id_carga`) REFERENCES `carga` (`id`),
  ADD CONSTRAINT `fk_viagem_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `fk_viagem_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
