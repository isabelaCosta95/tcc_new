-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2024 às 20:44
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
-- Estrutura da tabela `carga`
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
-- Extraindo dados da tabela `carga`
--

INSERT INTO `carga` (`id`, `descricao`, `id_produto`, `id_cliente`, `status`, `id_seguradora`, `quantidade`, `valor_total`, `nmr_seguro`) VALUES
(1, 'primeira carga', 3, 4, '', 1, '10', '45', '15'),
(2, 'segunda carga', 3, 4, '', 1, '10', '45', '15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `descricao`, `nome`) VALUES
(4, 'Dirigir todos as equipes', 'Diretor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `ativo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`, `ativo`) VALUES
(1, 'Laticínios - Vaca', 'S'),
(5, 'Remédio', 'S'),
(8, 'Congelados', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ibge` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cidade`
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
(11, 26, 'Presidente Venceslau', '4528'),
(12, 3, 'Maceio', '2704302');

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
  `id_cidade` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) NOT NULL,
  `observacao` varchar(50) NOT NULL,
  `ativo` char(1) DEFAULT 'S',
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `razao_social`, `nome_fantasia`, `cnpj_cpf`, `inscricao_estadual`, `endereco`, `bairro`, `complemento`, `numero`, `id_cidade`, `id_estado`, `telefone1`, `telefone2`, `observacao`, `ativo`, `email`) VALUES
(4, 'Lider LTDA', 'Lider', '14.520.000/0011-15', '518.344.548.67', 'Rua Lider', 'Lider II', '', '255', 10, 10, '(20) 99777-547', '', '', 'S', 'lider@lider.com'),
(11, 'Isabela Oliveira Vieira Costa', 'Isa Costa', '430.286.618-70', '123', 'Jeônimo Garcia Duarte', 'Jd. Tereza', '', '1135', 1, 26, '(18) 99630-942', '', '', 'S', 'isabelaovc95@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dt_vencimento` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `stts` varchar(1) NOT NULL,
  `dt_pagamento` date DEFAULT NULL,
  `form_pagamento` varchar(20) DEFAULT NULL,
  `plano_contas` int(11) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `qnt_parcelas` int(3) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `dt_vencimento`, `valor`, `stts`, `dt_pagamento`, `form_pagamento`, `plano_contas`, `observacao`, `qnt_parcelas`, `cliente`) VALUES
(1, 'Conta 1 teste', '2024-10-10', '100.00', 'P', '2024-10-10', 'Dinheiro', 1, '-', 1, 0),
(2, 'Conta teste valor - alterar', '2024-11-20', '1.59', 'C', '2024-11-02', '10', 15, 'TESTE OBSERVAÇÃO', 3, 9),
(3, 'Folha Pagamento - Maria Clara', '2024-11-01', '1500.00', 'A', '2024-11-17', '', 1, '', 1, 0),
(4, 'Viagem:  - parada 1', '2001-01-01', '15.00', 'A', NULL, NULL, NULL, NULL, 1, 3),
(5, 'Viagem:  - parada 2', '2001-01-01', '70.00', 'A', NULL, NULL, NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
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
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `descricao`, `dt_vencimento`, `valor`, `stts`, `dt_pagamento`, `form_pagamento`, `plano_contas`, `observacao`, `qnt_parcelas`, `cliente`) VALUES
(1, 'Pagamento de Serviço', '2024-12-10', '1500', 'P', '2024-12-12', 'Cartão de Crédito', 101, 'Serviço realizado em novembro', 1, 5),
(2, 'Venda de Produto', '2024-12-15', '300', 'A', '2024-12-06', '', 8, 'Parcelado em 3x', 3, 0),
(3, 'Assinatura Mensal', '2024-12-05', '100', 'P', '2024-12-06', 'Pix', 103, 'Referente ao mês de dezembro', 1, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
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
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `razao_social`, `nome_fantasia`, `inscricao_estadual`, `cnpj`, `inscricao_municipal`, `telefone`, `endereco`, `numero`, `bairro`, `complemento`, `id_cidade`, `id_estado`, `email`) VALUES
(1, 'TMS Sistema de Gerenciamento de Transportes LTDA.', 'TMS', '', '45.789.654/0001-25', '145879641', '(18)97854-6532', 'Jeônimo Garcia Duarte', '1135', 'Jd. Tereza', '', 1, 14, 'isabela@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `codigo_uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estado`
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
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ativo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id`, `descricao`, `ativo`) VALUES
(1, 'Dinheiro', 'S'),
(2, 'Cartão de Crédito', 'S'),
(3, 'Cartão de Débito', ''),
(4, 'Pix', 'S'),
(5, 'Transferência Bancária', 'S'),
(6, 'Boleto Bancário', 'S'),
(7, 'Cheque', 'S'),
(8, 'Vale Alimentação', 'S'),
(9, 'Vale Refeição', 'S'),
(10, 'Crédito na Loja', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
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
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome_completo`, `cpf`, `cnh`, `dt_nascimento`, `rg`, `dt_venc_cnh`, `endereco`, `bairro`, `numero`, `complemento`, `id_estado`, `id_cidade`, `telefone`, `chave_pix`, `email`, `ativo`, `observacao`) VALUES
(3, 'Isabela Oliveira Vieira Costa', '430.286.618-70', '5558889786', '2004-04-07', '456888899', '2032-06-20', 'Jeônimo Garcia Duarte', 'Vila Santa Tereza', '1135', '', 14, 3, '(18) 99630-9423', '18996309423', 'isabelaovc95@gmail.com', 'S', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao`
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
-- Estrutura da tabela `palete`
--

CREATE TABLE `palete` (
  `id` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `quantidade` decimal(10,0) NOT NULL,
  `justificativa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `palete`
--

INSERT INTO `palete` (`id`, `tipo`, `quantidade`, `justificativa`) VALUES
(1, 'E', '15', 'entrada teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parada`
--

CREATE TABLE `parada` (
  `id` int(11) NOT NULL,
  `parada` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `id_viagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `parada`
--

INSERT INTO `parada` (`id`, `parada`, `local`, `valor_unitario`, `id_viagem`) VALUES
(5, 'parada 1', 'local 1', '15.00', 7),
(6, 'parada 2', 'local 2', '70.00', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `peca`
--

CREATE TABLE `peca` (
  `descricao` varchar(150) NOT NULL,
  `id` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `peca`
--

INSERT INTO `peca` (`descricao`, `id`, `ativo`, `observacao`) VALUES
('Cilindro', 1, 'S', 'Localizado no Motor'),
('Transmissão', 3, 'S', ' Transfere a potência do motor'),
('Freios', 4, 'S', 'Responsável por parar o carro com segurança');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano_conta`
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
-- Extraindo dados da tabela `plano_conta`
--

INSERT INTO `plano_conta` (`id`, `descricao`, `ativo`, `natureza`, `tipo`, `observacao`) VALUES
(1, 'Despesas Operacionais', 'S', 'C', 'A', ''),
(2, 'Despesas com Pessoal', 'S', 'C', 'A', ''),
(3, 'Despesas de Marketing', 'S', 'C', 'A', ''),
(4, 'Despesas Administrativas', 'S', 'C', 'A', ''),
(5, 'Despesas Financeiras', 'S', 'C', 'A', ''),
(6, 'Despesas Tributárias', 'S', 'C', 'A', ''),
(7, 'Receitas Operacionais', 'S', 'C', 'A', '0'),
(8, 'Receitas de Vendas', 'S', 'C', 'A', '0'),
(9, 'Receitas Financeiras', 'S', 'C', 'A', '0'),
(10, 'Receitas de Investimentos', 'S', 'C', 'A', '0'),
(11, 'Ativo Circulante', 'S', 'C', 'A', '0');

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
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `id_categoria`, `marca`, `descricao`, `observacao`, `estoque`, `preco`, `unidade`, `validade`, `ativo`, `ncm`, `cfop`, `pis`, `cofins`, `icms_cst`, `aliquota_pis`, `aliquota_cofins`, `aliquota_icms`, `ipi`, `aliquota_reducao_bc`, `origem_icms`, `cest`, `gtin`, `aliquota_mva`, `codigo_barras`) VALUES
(3, 8, 'Sadia', 'Presunto', '', '0.00', '45.00', 1, 0, 'S', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '0.00', ''),
(6, 5, 'Lider', 'Leite', '', '14.00', '25.00', 2, 30, 'S', '02013000', '5405', '99', '99', '500', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', '', '0.00', '7895457444848');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguradora`
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
-- Extraindo dados da tabela `seguradora`
--

INSERT INTO `seguradora` (`id`, `nome`, `cnpj`, `email`, `inscricao_estadual`, `contato`, `telefone`) VALUES
(1, 'Seguradora ABC', '12.345.678/0001-90', 'contato@seguradoraabc.com', '123456789', 'João Silva', '(11) 98765-432'),
(2, 'Maria Seguradora', '454455454400011', 'maria@mariaseguros.com.br', '487856156416', 'Maria', '18991905901');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_venda`
--

CREATE TABLE `unidade_venda` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `abreviacao` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `unidade_venda`
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
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `placa`, `nome_proprietario`, `marca`, `cor`, `observacao`, `renavam`, `rntc`, `chassi`, `combustivel`, `dt_fabricacao`, `dt_licenciamento`) VALUES
(1, 'FIA9567', 'Maria Clara Assencio Brum', 'YAMAHA NEO 125', 'Vermelho', NULL, '189756423', 'MI8234', '4444444', 'Gasolina', '2017-03-02', '2024-03-03'),
(3, 'MAR-2503', 'Matheus Ales Viscardi', 'HONDA CG-160', 'Vermelho', NULL, '151611651451', '514564154541', '1415444244', 'Gasolina', '2017-12-06', '2024-01-25'),
(4, 'HRT-8675', 'Marcelo de Lima', 'HYUNDAI - HR', 'Branco', NULL, '8486946854', '54564574', '8484688645', 'Etanol/Gasolina', '2015-12-06', '2024-08-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagem`
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
-- Extraindo dados da tabela `viagem`
--

INSERT INTO `viagem` (`id`, `id_carga`, `data_inicio`, `data_fim`, `endereco_partida`, `endereco_chegada`, `id_veiculo`, `id_funcionario`, `observacao`) VALUES
(7, 1, '2001-01-01', '2002-02-02', 'partida', 'chegada', 1, 3, 'obs');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carga_cliente` (`id_cliente`),
  ADD KEY `fk_carga_produto` (`id_produto`),
  ADD KEY `fk_carga_seguradora` (`id_seguradora`);

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_cidade_estado` (`id_estado`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cidade` (`id_cidade`),
  ADD KEY `fk_cliente_estado` (`id_estado`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cidade` (`id_cidade`),
  ADD KEY `id_estado` (`id_estado`);

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
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionario_estado` (`id_estado`),
  ADD KEY `fk_funcionario_cidade` (`id_cidade`);

--
-- Índices para tabela `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_manutencao_veiculo` (`id_veiculo`);

--
-- Índices para tabela `palete`
--
ALTER TABLE `palete`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `parada`
--
ALTER TABLE `parada`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `peca`
--
ALTER TABLE `peca`
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
  ADD KEY `fk_codigo_categoria` (`id_categoria`);

--
-- Índices para tabela `seguradora`
--
ALTER TABLE `seguradora`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `unidade_venda`
--
ALTER TABLE `unidade_venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `viagem`
--
ALTER TABLE `viagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_viagem_carga` (`id_carga`),
  ADD KEY `fk_viagem_funcionario` (`id_funcionario`),
  ADD KEY `fk_viagem_veiculo` (`id_veiculo`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `peca`
--
ALTER TABLE `peca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `plano_conta`
--
ALTER TABLE `plano_conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `seguradora`
--
ALTER TABLE `seguradora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `viagem`
--
ALTER TABLE `viagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `fk_carga_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `fk_carga_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `fk_carga_seguradora` FOREIGN KEY (`id_seguradora`) REFERENCES `seguradora` (`id`);

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `fk_cliente_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `id_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `fk_funcionario_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `manutencao`
--
ALTER TABLE `manutencao`
  ADD CONSTRAINT `fk_manutencao_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_codigo_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `viagem`
--
ALTER TABLE `viagem`
  ADD CONSTRAINT `fk_viagem_carga` FOREIGN KEY (`id_carga`) REFERENCES `carga` (`id`),
  ADD CONSTRAINT `fk_viagem_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `fk_viagem_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
