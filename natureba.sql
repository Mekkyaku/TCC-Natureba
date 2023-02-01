-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Out-2022 às 02:08
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `natureba`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentos`
--

CREATE TABLE `alimentos` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(64) NOT NULL,
  `Classe` varchar(64) NOT NULL,
  `Info` varchar(3200) NOT NULL,
  `Tags` varchar(640) NOT NULL,
  `Imagem` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alimentos`
--

INSERT INTO `alimentos` (`ID`, `Nome`, `Classe`, `Info`, `Tags`, `Imagem`) VALUES
(1, 'Pão francês', 'carboidratos', 'Porção de 100g&#13;&#10;&#13;&#10;・Valor energético: 299.8kcal&#13;&#10;・Carboidratos: 58.7g&#13;&#10;・Proteínas: 8g&#13;&#10;・Gorduras saturadas: 1g&#13;&#10;・Gorduras monoinsaturadas: 0.9g&#13;&#10;・Gorduras poli-insaturadas: 0.7g&#13;&#10;・Fibra alimentar: 2.3g&#13;&#10;・Fibras solúveis: 0.6g&#13;&#10;・Cálcio: 15.8mg&#13;&#10;・Vitamina A: 3ug&#13;&#10;・Piridoxina B6: 0.6mg&#13;&#10;・Fósforo: 94.7mg&#13;&#10;・Manganês: 0.5mg&#13;&#10;・Magnésio: 25.5mg&#13;&#10;・Lipídios: 3.1g&#13;&#10;・Ferro: 1mg&#13;&#10;・Potássio: 142.2mg&#13;&#10;・Cobre: 0.1ug&#13;&#10;・Zinco: 0.8mg&#13;&#10;・Niacina: 2.3mg&#13;&#10;・Tiamina B1: 0.4mg&#13;&#10;・Riboflavina B2: 0.7mg&#13;&#10;・Sódio: 647.7mg', 'pao frances', '1662587388631911fccef71.jpg'),
(2, 'Água de coco', 'bebidas', 'Porção de 100g&#13;&#10;&#13;&#10;・Valor energético: 21.5 kcal&#13;&#10;・Carboidratos: 5.4g&#13;&#10;・Fibra alimentar: 0.1g&#13;&#10;・Cálcio: 18.8mg&#13;&#10;・Vitamina C: 2.4mg&#13;&#10;・Manganês: 0.3mg&#13;&#10;・Magnésio: 5.2mg&#13;&#10;・Fósforo: 3.8mg&#13;&#10;・Potássio: 161.7mg&#13;&#10;・Sódio: 1.8mg', 'agua de coco', '16625830986319013ae7ad5.jpg'),
(3, 'Ovo frito', 'carnes', 'Porção de 100g&#13;&#10;&#13;&#10;・Valor energético: 240.2 kcal&#13;&#10;・Carboidratos: 1.2g&#13;&#10;・Proteínas: 15.6g&#13;&#10;・Gorduras saturadas: 4.1g&#13;&#10;・Gorduras monoinsaturadas: 5.7g&#13;&#10;・Gorduras poli-insaturadas: 4.9g&#13;&#10;・Cálcio: 72.9mg&#13;&#10;・Vitamina A: 93.9ug&#13;&#10;・Magnésio: 16.3mg&#13;&#10;・Colesterol: 516.3mg&#13;&#10;・Lipídios: 18.6g&#13;&#10;・Fósforo: 422.4mg&#13;&#10;・Ferro: 2.1mg&#13;&#10;・Potássio: 184mg&#13;&#10;・Zinco: 1.5mg&#13;&#10;・Tiamina B1: 0.1mg&#13;&#10;・Riboflavina B2: 0.3mg&#13;&#10;・Sódio: 166.1mg', 'ovo frito ovo de galinha', '1662583456631902a05a7d0.jpg'),
(4, 'Abacate', 'frutas', 'WIP', 'abacate', '1662686172631a93dce8ecb.jpg'),
(5, 'Feijão carioca', 'leguminosas', 'WIP', 'feijao carioca', '1662686196631a93f44ff2d.png'),
(6, 'Queijo prato', 'leites', 'WIP', 'queijo prato', '1662686222631a940edf498.png'),
(7, 'Repolho roxo', 'hortalicas', 'WIP', 'repolho roxo', '1662686269631a943d85304.png'),
(8, 'Cenoura', 'hortalicas', 'WIP', 'cenoura', '1662686557631a955df2a56.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `Mensagem` varchar(256) NOT NULL,
  `User1` int(11) NOT NULL,
  `User2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`ID`, `Mensagem`, `User1`, `User2`) VALUES
(5, 'Mensagem', 16, 17),
(6, 'Mensagem', 16, 17),
(7, 'Mensagem', 17, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `ID` int(11) NOT NULL,
  `Codigo` int(6) NOT NULL,
  `Nome` varchar(64) NOT NULL,
  `Sobrenome` varchar(64) NOT NULL,
  `Completo` varchar(129) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Senha` varchar(256) NOT NULL,
  `Nascimento` varchar(11) NOT NULL,
  `Tipo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`ID`, `Codigo`, `Nome`, `Sobrenome`, `Completo`, `Email`, `Senha`, `Nascimento`, `Tipo`) VALUES
(16, 631713, 'Ricardo', 'de Paula Assis', 'Ricardo de Paula Assis', 'cliente1@gmail.com', '$2y$10$mdemzRTPfdXcEvGRR0Unie2U1hAuxQBheJoXc6Zl87YZW/p1OI5je', '1/1/2000', 'C'),
(17, 116982, 'Jordan', 'Carter', 'Jordan Carter', 'nutri1@gmail.com', '$2y$10$BxIUMbD0QdxhFbMFrx/4DOPSOo24sILAyPcq79.OUDjxfOIF5pQra', '1/1/2000', 'N'),
(18, 653124, 'Jacques', 'Webster', 'Jacques Webster', 'cliente2@gmail.com', '$2y$10$jBepQR6ONf6PTTA8cNmlhOiZXQnle0fUb5Jv1WHkLaw8rfNIeXeWW', '30/4/1991', 'C'),
(19, 211691, 'Fernanda', 'Silva', 'Fernanda Silva', 'cliente3@gmail.com', '$2y$10$qNR9DPWbQGyjyjCn5.ULIOtfeQWVclWEHMyTJaiLNs6cLSSNWvCrW', '1/1/2000', 'C'),
(20, 673953, 'Felipe', 'Delfino', 'Felipe Delfino', 'felipe.delfino3500@gmail.com', '$2y$10$iQWFYsTSPFyieFRDXKGY5eaz9yvUOucKwU22xL21y4cy63MU2OyKS', '18/5/2005', 'A'),
(21, 868889, 'Dominíco', 'Oliver', 'Dominíco Oliver', 'nutri2@gmail.com', '$2y$10$4tjNYvsOPAND2NIZqWweWekcIIJNIHdt6gQ.qvgrXsgS55I6zfyx.', '1/1/2000', 'N'),
(22, 469501, 'Gabriel', 'Rodrigues Junior', 'Gabriel Rodrigues Junior', 'nutri3@gmail.com', '$2y$10$VV96UTrATZjUYsGYGNgp7O05./9/G/cMmMQLiQjO0FRLY0qx5IOF.', '1/1/2000', 'N'),
(23, 239285, 'Flavia', 'Romão', 'Flavia Romão', 'nutri4@gmail.com', '$2y$10$vo0ZGmVQRvNRkUDYEBZJWecJwyfs85esVV33ohzGuT6nyOdLcIwB6', '1/1/2000', 'N'),
(24, 580259, 'João', 'Gomes', 'João Gomes', 'nutri5@gmail.com', '$2y$10$Yjh6LP7eHrOyZpN9H1wf/uzPlMBba1CDcx6O.ZEX8L5AGQ5F/aNu.', '1/1/2000', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diarios`
--

CREATE TABLE `diarios` (
  `ID` int(11) NOT NULL,
  `idDono` int(11) NOT NULL,
  `Data` varchar(32) NOT NULL,
  `Peso` int(3) NOT NULL,
  `Alimentacao` varchar(500) NOT NULL,
  `Agua` int(2) NOT NULL,
  `Extra` varchar(500) DEFAULT NULL,
  `Exercicios` varchar(500) DEFAULT NULL,
  `Sintomas` varchar(500) DEFAULT NULL,
  `Imagem` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `diarios`
--

INSERT INTO `diarios` (`ID`, `idDono`, `Data`, `Peso`, `Alimentacao`, `Agua`, `Extra`, `Exercicios`, `Sintomas`, `Imagem`) VALUES
(5, 16, '29 de outubro de 2022', 70, 'Alimentação do dia', 3, 'Medicamentos e suplementos do dia', 'Exercícios físicos do dia', 'Queixas e sintomas do dia', 'no-image.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dietas`
--

CREATE TABLE `dietas` (
  `ID` int(11) NOT NULL,
  `idDono` int(11) NOT NULL,
  `Texto` varchar(3200) NOT NULL,
  `Data` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dietas`
--

INSERT INTO `dietas` (`ID`, `idDono`, `Texto`, `Data`) VALUES
(2, 16, '                                                                             Texto da dieta', '29/10/2022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estrelas`
--

CREATE TABLE `estrelas` (
  `ID` int(11) NOT NULL,
  `Origem` varchar(1) NOT NULL,
  `Estrelado` int(11) NOT NULL,
  `Estrelador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `existencia`
--

CREATE TABLE `existencia` (
  `ID` int(11) NOT NULL,
  `User1` int(11) NOT NULL,
  `User2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `existencia`
--

INSERT INTO `existencia` (`ID`, `User1`, `User2`) VALUES
(3, 16, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed`
--

CREATE TABLE `feed` (
  `ID` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Imagem` varchar(256) NOT NULL,
  `Titulo` varchar(64) NOT NULL,
  `Texto` varchar(256) NOT NULL,
  `Link` varchar(256) NOT NULL,
  `Data` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `feed`
--

INSERT INTO `feed` (`ID`, `idUser`, `Imagem`, `Titulo`, `Texto`, `Link`, `Data`) VALUES
(15, 16, 'no-image.png', 'Ricardo adicionou Jordan Carter como seu nutricionista', 'Ricardo acabou de adicionar Jordan Carter como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=17', '29/10/2022, 20:42'),
(16, 17, 'no-image.png', 'Ricardo adicionou Jordan Carter como seu nutricionista', 'Ricardo acabou de adicionar Jordan Carter como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=16', '29/10/2022, 20:42'),
(17, 18, 'no-image.png', 'Jacques adicionou Jordan Carter como seu nutricionista', 'Jacques acabou de adicionar Jordan Carter como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=17', '29/10/2022, 20:48'),
(18, 17, 'no-image.png', 'Jacques adicionou Jordan Carter como seu nutricionista', 'Jacques acabou de adicionar Jordan Carter como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=18', '29/10/2022, 20:48'),
(19, 19, 'no-image.png', 'Fernanda adicionou Jordan Carter como seu nutricionista', 'Fernanda acabou de adicionar Jordan Carter como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=17', '29/10/2022, 20:48'),
(20, 17, 'no-image.png', 'Fernanda adicionou Jordan Carter como seu nutricionista', 'Fernanda acabou de adicionar Jordan Carter como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=19', '29/10/2022, 20:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(64) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Msg` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `ID` int(11) NOT NULL,
  `idDono` int(11) NOT NULL,
  `Imagem` varchar(256) NOT NULL,
  `Titulo` varchar(64) NOT NULL,
  `Texto` varchar(256) NOT NULL,
  `Link` varchar(256) NOT NULL,
  `Data` varchar(17) NOT NULL,
  `Lido` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`ID`, `idDono`, `Imagem`, `Titulo`, `Texto`, `Link`, `Data`, `Lido`) VALUES
(16, 17, 'no-image.png', 'Ricardo de Paula Assis adicionou você como seu nutricionista', 'Ricardo de Paula Assis acabou de te adicionar como seu nutricionista. Clique aqui para ver seu perfil.', '../perfil/perfil.php?id=16', '29/10/2022, 20:42', 'N'),
(17, 17, 'no-image.png', 'Jacques Webster adicionou você como seu nutricionista', 'Jacques Webster acabou de te adicionar como seu nutricionista. Clique aqui para ver seu perfil.', '../perfil/perfil.php?id=18', '29/10/2022, 20:48', 'N'),
(18, 17, 'no-image.png', 'Fernanda Silva adicionou você como seu nutricionista', 'Fernanda Silva acabou de te adicionar como seu nutricionista. Clique aqui para ver seu perfil.', '../perfil/perfil.php?id=19', '29/10/2022, 20:48', 'N'),
(19, 16, 'no-image.png', 'Sua dieta foi atualizada', 'Jordan Carter, seu nutricionista, acabou de atualizar sua dieta. Clique aqui para vê-la.', '../dieta/cliente.php', '29/10/2022, 20:57', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nutricionistas`
--

CREATE TABLE `nutricionistas` (
  `ID` int(11) NOT NULL,
  `Nutricionista` int(11) NOT NULL,
  `Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nutricionistas`
--

INSERT INTO `nutricionistas` (`ID`, `Nutricionista`, `Cliente`) VALUES
(6, 17, 16),
(7, 17, 18),
(8, 17, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `ID` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Imagem` varchar(256) DEFAULT NULL,
  `Altura` int(3) DEFAULT NULL,
  `Peso` int(3) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `CRN` varchar(11) DEFAULT NULL,
  `Cidade` varchar(64) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `Bio` varchar(256) DEFAULT NULL,
  `Estrelas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`ID`, `idUser`, `Imagem`, `Altura`, `Peso`, `Sexo`, `CPF`, `CRN`, `Cidade`, `UF`, `Bio`, `Estrelas`) VALUES
(16, 16, 'no-image.png', 170, 70, 'M', NULL, NULL, NULL, NULL, 'Olá! Eu também uso o Natureba!', 0),
(17, 17, 'no-image.png', NULL, NULL, NULL, '11111111111', '1-1111/-', 'São Paulo', 'SP', 'Olá! Eu também uso o Natureba!', 0),
(18, 18, 'no-image.png', 189, 70, 'M', NULL, NULL, NULL, NULL, 'Olá! Eu também uso o Natureba!', 0),
(19, 19, 'no-image.png', 176, 68, 'F', NULL, NULL, NULL, NULL, 'Olá! Eu também uso o Natureba!', 0),
(20, 20, '1667088269635dbf8d26b57.jpg', 0, 0, '', NULL, NULL, NULL, NULL, 'Olá! Eu também uso o Natureba!', 0),
(21, 21, 'no-image.png', NULL, NULL, NULL, '11111111112', '1-2222/-', 'Belo Horizonte', 'MG', 'Olá! Eu também uso o Natureba!', 0),
(22, 22, 'no-image.png', NULL, NULL, NULL, '123456789', '1-3333/-', 'Rio de Janeiro', 'RJ', 'Olá! Eu também uso o Natureba!', 0),
(23, 23, 'no-image.png', NULL, NULL, NULL, '98765432110', '1-4444/-', 'Vitória', 'ES', 'Olá! Eu também uso o Natureba!', 0),
(24, 24, 'no-image.png', NULL, NULL, NULL, '10987654321', '1-5555/-', 'Brasília', 'DF', 'Olá! Eu também uso o Natureba!', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `ID` int(11) NOT NULL,
  `idDono` int(11) NOT NULL,
  `Titulo` varchar(64) NOT NULL,
  `Descricao` varchar(256) NOT NULL,
  `Ingredientes` varchar(800) NOT NULL,
  `Preparo` varchar(6400) NOT NULL,
  `Data` varchar(10) NOT NULL,
  `Imagem` varchar(256) NOT NULL,
  `Estrelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`ID`, `idDono`, `Titulo`, `Descricao`, `Ingredientes`, `Preparo`, `Data`, `Imagem`, `Estrelas`) VALUES
(4, 17, 'Maionese natural sem ovos', 'Procurando uma maionese diferente e saudável? Então experimente essa dica de receita de maionese natural sem ovos.', '- 1 cenoura média&#13;&#10;- 1 batata média&#13;&#10;- 1 colher de sopa de extrato de soja ou leite em pó (ou maisena/amido de milho ou biomassa de banana verde para alérgicos)&#13;&#10;- 2 colheres de sopa de azeite de oliva extravirgem&#13;&#10;- ½ xícara da água do cozimento da batata&#13;&#10;- Sal marinho a gosto&#13;&#10;- Pimenta branca, orégano, noz moscada e salsinha picada a gosto', '1. Cozinhe a cenoura e a batata, descascadas e cortadas em pedaços grandes, na mesma panela, com água suficiente para cobrir.&#13;&#10;&#13;&#10;2. Coloque no liquidificador a cenoura e a batata, ainda quentes com 1/2 xícara da água do cozimento e o extrato de soja.&#13;&#10;&#13;&#10;3. Bata até ficar cremoso.&#13;&#10;&#13;&#10;4. Acrescente o azeite.&#13;&#10;&#13;&#10;5. Tempere com sal, pimenta moída, orégano, salsinha picada.&#13;&#10;&#13;&#10;6. Esta maionese pode ser servida para usar como pasta para passar no pão, preparar sanduíches ou para misturar aos legumes para fazer uma salada.', '29/10/2022', '1667089363635dc3d39f7e9.png', 0),
(5, 17, 'Peixe ao molho de laranja', 'Receita de peixe ao molho de laranja: uma receita leve, gostosa, saudável e prática! Tudo de bom para mudar a cara do seu peixe assado! Pegue os seus ingredientes para começar!', '- 500 g peixe (salmão, linguado, tilápia...)&#13;&#10;- 250 ml suco de laranja sem açúcar&#13;&#10;- 2 colheres de chá mel&#13;&#10;- Alecrim a gosto (fresco ou desidratado)&#13;&#10;- 2 colheres de sopa de biomassa de banana para engrossar (se for em farinha, peneirar para não formar grumos no molho), ou usar maisena&#13;&#10;- Raspas de gengibre fresco (a gosto)', '1. Tempere o peixe ao seu gosto ou com sal marinho, azeite de oliva, limão.&#13;&#10;&#13;&#10;2. Coloque numa assadeira para assar.&#13;&#10;&#13;&#10;3. Enquanto assa, prepare o molho. Pegue uma frigideira, coloque o suco de laranja, o mel, o gengibre e o alecrim.&#13;&#10;&#13;&#10;4. Mexa para misturar e desmanchar o mel, deixe levantar fervura e coloque a biomassa para engrossar, mexendo sempre até dar um ponto mais consistente.&#13;&#10;&#13;&#10;5. Tire o peixe do forno e coloque em cima o molho ainda quente.', '29/10/2022', '1667089577635dc4a9a94aa.png', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `diarios`
--
ALTER TABLE `diarios`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `dietas`
--
ALTER TABLE `dietas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `estrelas`
--
ALTER TABLE `estrelas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `existencia`
--
ALTER TABLE `existencia`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `nutricionistas`
--
ALTER TABLE `nutricionistas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `diarios`
--
ALTER TABLE `diarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `dietas`
--
ALTER TABLE `dietas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `estrelas`
--
ALTER TABLE `estrelas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `existencia`
--
ALTER TABLE `existencia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `feed`
--
ALTER TABLE `feed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `nutricionistas`
--
ALTER TABLE `nutricionistas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
