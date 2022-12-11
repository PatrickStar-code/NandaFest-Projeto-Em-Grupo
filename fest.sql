-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Dez-2022 às 20:27
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fest`
--
CREATE DATABASE IF NOT EXISTS `fest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fest`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `cod_pedidos` int(11) NOT NULL,
  `descricao_pedido` varchar(250) NOT NULL,
  `dthr_pedido` datetime NOT NULL,
  `cidade_pedido` varchar(100) NOT NULL,
  `logradouro_pedido` varchar(100) NOT NULL,
  `status_pedido` varchar(20) NOT NULL,
  `comentario_pedido` varchar(100) NOT NULL,
  `valor_pedido` varchar(45) NOT NULL,
  `clientes_cod_cliente` int(11) NOT NULL,
  `funcionarios_cod_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `idchat` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `PARA` varchar(200) NOT NULL,
  `dh_mensagem` timestamp NOT NULL DEFAULT current_timestamp(),
  `clientes_cod_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `telefone_cliente` varchar(15) NOT NULL,
  `email_cliente` varchar(100) DEFAULT NULL,
  `celular_cliente` varchar(15) DEFAULT NULL,
  `cidade_cliente` varchar(45) NOT NULL,
  `cep_cliente` varchar(45) NOT NULL,
  `login_cliente` varchar(250) NOT NULL,
  `senha_cliente` varchar(250) NOT NULL,
  `cpf_cliente` varchar(15) NOT NULL,
  `img_cliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cod_cliente`, `nome_cliente`, `telefone_cliente`, `email_cliente`, `celular_cliente`, `cidade_cliente`, `cep_cliente`, `login_cliente`, `senha_cliente`, `cpf_cliente`, `img_cliente`) VALUES
(1, 'patrick', '(32)9845-5852', 'patrick@mail.com', '(32)98844-4406', 'Juiz de fora', 'Tiguera', 'patrick3235', 'patrick1234', '892-913-213-32', NULL),
(2, 'emanoel', '(32)8974-5462', 'manu@gmail.com', '(32)4568-7954', 'Juiz de fora', 'Santo Antonio', 'manu321', 'manu123', '865.489.456-48', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `decoracoes`
--

CREATE TABLE `decoracoes` (
  `cod_decoracoes` int(11) NOT NULL,
  `descricao_decoracao` varchar(45) NOT NULL,
  `img_decoracao` varchar(200) NOT NULL,
  `temas_cod_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `decoracoes`
--

INSERT INTO `decoracoes` (`cod_decoracoes`, `descricao_decoracao`, `img_decoracao`, `temas_cod_tema`) VALUES
(1, 'Kit Mundo Bita', '../Imgs_banco/desenhos.jpg', 1),
(2, 'Kit Mickey', '../Imgs_banco/disney.jpg', 2),
(3, 'Kit Fazendinha 1', '../Imgs_banco/fazenda.jpg', 3),
(4, 'Kit Praia 1', '../Imgs_banco/praia.jpg', 5),
(5, 'Kit Flamengo', '../Imgs_banco/times.jpg', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dec_agendamento`
--

CREATE TABLE `dec_agendamento` (
  `id_dec_agendamento` int(10) NOT NULL,
  `agendamentos_cod_pedidos` int(11) NOT NULL,
  `decoracoes_cod_decoracoes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `cod_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(45) NOT NULL,
  `img_empresa` varchar(45) DEFAULT NULL,
  `cnpj_empresa` varchar(45) NOT NULL,
  `gestores_cod_gestor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`cod_empresa`, `nome_empresa`, `img_empresa`, `cnpj_empresa`, `gestores_cod_gestor`) VALUES
(1, 'NandaFest', '../Imgs_banco/logo.png', '12.682.096/0001-02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `cod_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `login_funcionario` varchar(250) NOT NULL,
  `senha_funcionario` varchar(250) NOT NULL,
  `telefone_funcionario` varchar(45) DEFAULT NULL,
  `cpf_funcionario` varchar(15) NOT NULL,
  `logradouro_funcionario` varchar(100) NOT NULL,
  `celular_funcionario` varchar(45) DEFAULT NULL,
  `email_funcionario` varchar(45) NOT NULL,
  `img_funcionario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`cod_funcionario`, `nome_funcionario`, `login_funcionario`, `senha_funcionario`, `telefone_funcionario`, `cpf_funcionario`, `logradouro_funcionario`, `celular_funcionario`, `email_funcionario`, `img_funcionario`) VALUES
(1, 'Fernanda', 'fernanda123', 'fernanda321', '(32)98844-3278', '769.437.410-12', 'Caiçaras', '(32)98844-3278', 'fernanda@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestores`
--

CREATE TABLE `gestores` (
  `cod_gestor` int(11) NOT NULL,
  `funcionarios_cod_funcionario` int(11) NOT NULL,
  `login_gestor` varchar(45) NOT NULL,
  `senha_gestor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `gestores`
--

INSERT INTO `gestores` (`cod_gestor`, `funcionarios_cod_funcionario`, `login_gestor`, `senha_gestor`) VALUES
(1, 1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temas`
--

CREATE TABLE `temas` (
  `cod_tema` int(11) NOT NULL,
  `descricao_tema` varchar(250) NOT NULL,
  `img_tema` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `temas`
--

INSERT INTO `temas` (`cod_tema`, `descricao_tema`, `img_tema`) VALUES
(1, 'Desenho', '../Imgs_banco/desenhos.jpg'),
(2, 'Disney', '../Imgs_banco/disney.jpg'),
(3, 'Fazenda', '../Imgs_banco/fazenda.jpg'),
(4, 'Infantil', '../Imgs_banco/infantil.jpg'),
(5, 'Praia', '../Imgs_banco/praia.jpg'),
(6, 'Times', '../Imgs_banco/times.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`cod_pedidos`),
  ADD KEY `fk_pedidos_clientes1_idx` (`clientes_cod_cliente`),
  ADD KEY `fk_agendamentos_funcionarios1_idx` (`funcionarios_cod_funcionario`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idchat`),
  ADD KEY `fk_chat_clientes1_idx` (`clientes_cod_cliente`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Índices para tabela `decoracoes`
--
ALTER TABLE `decoracoes`
  ADD PRIMARY KEY (`cod_decoracoes`),
  ADD KEY `fk_decoracoes_temas1_idx` (`temas_cod_tema`);

--
-- Índices para tabela `dec_agendamento`
--
ALTER TABLE `dec_agendamento`
  ADD PRIMARY KEY (`id_dec_agendamento`),
  ADD KEY `fk_dec_agendamento_decoracoes1_idx` (`decoracoes_cod_decoracoes`),
  ADD KEY `fk_dec_agendamento_agendamentos1_idx` (`agendamentos_cod_pedidos`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cod_empresa`),
  ADD KEY `fk_empresa_gestores1_idx` (`gestores_cod_gestor`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`cod_funcionario`);

--
-- Índices para tabela `gestores`
--
ALTER TABLE `gestores`
  ADD PRIMARY KEY (`cod_gestor`),
  ADD KEY `fk_gestores_funcionarios_idx` (`funcionarios_cod_funcionario`);

--
-- Índices para tabela `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`cod_tema`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `cod_pedidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `decoracoes`
--
ALTER TABLE `decoracoes`
  MODIFY `cod_decoracoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `dec_agendamento`
--
ALTER TABLE `dec_agendamento`
  MODIFY `id_dec_agendamento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `cod_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `cod_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `gestores`
--
ALTER TABLE `gestores`
  MODIFY `cod_gestor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `temas`
--
ALTER TABLE `temas`
  MODIFY `cod_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `fk_agendamentos_funcionarios1` FOREIGN KEY (`funcionarios_cod_funcionario`) REFERENCES `funcionarios` (`cod_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_clientes1` FOREIGN KEY (`clientes_cod_cliente`) REFERENCES `clientes` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_clientes1` FOREIGN KEY (`clientes_cod_cliente`) REFERENCES `clientes` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `decoracoes`
--
ALTER TABLE `decoracoes`
  ADD CONSTRAINT `fk_decoracoes_temas1` FOREIGN KEY (`temas_cod_tema`) REFERENCES `temas` (`cod_tema`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dec_agendamento`
--
ALTER TABLE `dec_agendamento`
  ADD CONSTRAINT `fk_dec_agendamento_agendamentos1` FOREIGN KEY (`agendamentos_cod_pedidos`) REFERENCES `agendamentos` (`cod_pedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dec_agendamento_decoracoes1` FOREIGN KEY (`decoracoes_cod_decoracoes`) REFERENCES `decoracoes` (`cod_decoracoes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_gestores1` FOREIGN KEY (`gestores_cod_gestor`) REFERENCES `gestores` (`cod_gestor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `gestores`
--
ALTER TABLE `gestores`
  ADD CONSTRAINT `fk_gestores_funcionarios` FOREIGN KEY (`funcionarios_cod_funcionario`) REFERENCES `funcionarios` (`cod_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
