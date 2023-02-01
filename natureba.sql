-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Set-2022 às 02:54
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
(1, 'Pão Francês', 'carboidratos', 'Porção de 100g&#13;&#10;&#13;&#10;・Valor energético: 299.8kcal&#13;&#10;・Carboidratos: 58.7g&#13;&#10;・Proteínas: 8g&#13;&#10;・Gorduras saturadas: 1g&#13;&#10;・Gorduras monoinsaturadas: 0.9g&#13;&#10;・Gorduras poli-insaturadas: 0.7g&#13;&#10;・Fibra alimentar: 2.3g&#13;&#10;・Fibras solúveis: 0.6g&#13;&#10;・Cálcio: 15.8mg&#13;&#10;・Vitamina A: 3ug&#13;&#10;・Piridoxina B6: 0.6mg&#13;&#10;・Fósforo: 94.7mg&#13;&#10;・Manganês: 0.5mg&#13;&#10;・Magnésio: 25.5mg&#13;&#10;・Lipídios: 3.1g&#13;&#10;・Ferro: 1mg&#13;&#10;・Potássio: 142.2mg&#13;&#10;・Cobre: 0.1ug&#13;&#10;・Zinco: 0.8mg&#13;&#10;・Niacina: 2.3mg&#13;&#10;・Tiamina B1: 0.4mg&#13;&#10;・Riboflavina B2: 0.7mg&#13;&#10;・Sódio: 647.7mg', 'pao frances', '1662587388631911fccef71.jpg'),
(2, 'Água de Coco', 'bebidas', 'Porção de 100g&#13;&#10;&#13;&#10;・Valor energético: 21.5 kcal&#13;&#10;・Carboidratos: 5.4g&#13;&#10;・Fibra alimentar: 0.1g&#13;&#10;・Cálcio: 18.8mg&#13;&#10;・Vitamina C: 2.4mg&#13;&#10;・Manganês: 0.3mg&#13;&#10;・Magnésio: 5.2mg&#13;&#10;・Fósforo: 3.8mg&#13;&#10;・Potássio: 161.7mg&#13;&#10;・Sódio: 1.8mg', 'agua de coco', '16625830986319013ae7ad5.jpg'),
(3, 'Ovo Frito', 'carnes', 'Porção de 100g&#13;&#10;&#13;&#10;・Valor energético: 240.2 kcal&#13;&#10;・Carboidratos: 1.2g&#13;&#10;・Proteínas: 15.6g&#13;&#10;・Gorduras saturadas: 4.1g&#13;&#10;・Gorduras monoinsaturadas: 5.7g&#13;&#10;・Gorduras poli-insaturadas: 4.9g&#13;&#10;・Cálcio: 72.9mg&#13;&#10;・Vitamina A: 93.9ug&#13;&#10;・Magnésio: 16.3mg&#13;&#10;・Colesterol: 516.3mg&#13;&#10;・Lipídios: 18.6g&#13;&#10;・Fósforo: 422.4mg&#13;&#10;・Ferro: 2.1mg&#13;&#10;・Potássio: 184mg&#13;&#10;・Zinco: 1.5mg&#13;&#10;・Tiamina B1: 0.1mg&#13;&#10;・Riboflavina B2: 0.3mg&#13;&#10;・Sódio: 166.1mg', 'ovo frito ovo de galinha', '1662583456631902a05a7d0.jpg'),
(4, 'Abacate', 'frutas', 'WIP', 'abacate', '1662686172631a93dce8ecb.jpg'),
(5, 'Feijão Carioca', 'leguminosas', 'WIP', 'feijao carioca', '1662686196631a93f44ff2d.png'),
(6, 'Queijo Prato', 'leites', 'WIP', 'queijo prato', '1662686222631a940edf498.png'),
(7, 'Repolho Roxo', 'hortalicas', 'WIP', 'repolho roxo', '1662686269631a943d85304.png'),
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
(1, 'Mensagem', 1, 4),
(2, 'Mensagem', 4, 1),
(3, 'Mensagem', 1, 4);

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
(1, 998499, 'Pedro', 'Barboza', 'Pedro Barboza', 'cliente1@gmail.com', '$2y$10$StZhdd8be5abaSPrF4WiNez7uz0xP9OBb06i3De2h.8HpV0/UXaEm', '1/1/2000', 'C'),
(2, 984993, 'Sandro', 'Pereira', 'Sandro Pereira', 'nutri1@gmail.com', '$2y$10$rIPnCmmdgMaMZOH4wphKkelfmjaA.BjKp68f4w7ct0dWLdA4C/9BC', '1/1/2000', 'N'),
(3, 549937, 'João', 'da Silva', 'João da Silva', 'nutri2@gmail.com', '$2y$10$4iVrWMWZ8.AH8rnV/ezEt.QzQLcNIGe.xM3PZ6L97EFdgSsL96A2C', '1/1/2000', 'N'),
(4, 750272, 'Ricardo', 'de Paula Assis', 'Ricardo de Paula Assis', 'nutri3@gmail.com', '$2y$10$ag6tbK9Zkv00mVeJoWv.a.zTZNrxOQjaU4Udrfp/PQumPmz9GwZ6C', '1/1/2000', 'N'),
(5, 464188, 'Samira', 'Gama', 'Samira Gama', 'nutri4@gmail.com', '$2y$10$80Lrcqe3w5PuXxtxem1ou.vHDcbJhGvTcAu1XzK4.3Xt2u/AByEHS', '1/1/2000', 'N'),
(6, 889245, 'Maria', 'Alves', 'Maria Alves', 'nutri5@gmail.com', '$2y$10$0pddSXXTsrIdsoQeNEWujeil02uZir105qRyU.tGqSdQckw.RQSCm', '1/1/2000', 'N'),
(7, 542661, 'Rodrigo', 'Alves', 'Rodrigo Alves', 'cliente2@gmail.com', '$2y$10$Ui/BxgK4iZXkP15mpU5DSuIvqBfT1jfIQEFFPV16I3wBrGDEeF8z6', '1/1/2000', 'C'),
(8, 326895, 'Rogéria', 'Matos', 'Rogéria Matos', 'cliente3@gmail.com', '$2y$10$Nv3q0SDB.FBilj.HAK3Db.07Mr3H4.nGi0B3w.3nux3vDoh.OwYK.', '1/1/2000', 'C'),
(9, 851289, 'Felipe', 'Delfino', 'Felipe Delfino', 'felipe.delfino3500@gmail.com', '$2y$10$5ci/N.tenukpvQRw8fIrDeg76Al0zWFxUbWITgaA9ttie/B2neW76', '18/5/2005', 'A');

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
(1, 1, '                                                                          TEXTO DA DIETA', '08/09/2022');

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
(1, 1, 4);

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
(1, 1, 'no-image.png', 'Pedro adicionou Ricardo de Paula Assis como seu nutricionista', 'Pedro acabou de adicionar Ricardo de Paula Assis como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=4', '08/09/2022, 20:01'),
(2, 4, 'no-image.png', 'Pedro adicionou Ricardo de Paula Assis como seu nutricionista', 'Pedro acabou de adicionar Ricardo de Paula Assis como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=1', '08/09/2022, 20:01'),
(3, 7, 'no-image.png', 'Rodrigo adicionou Ricardo de Paula Assis como seu nutricionista', 'Rodrigo acabou de adicionar Ricardo de Paula Assis como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=4', '08/09/2022, 21:17'),
(4, 4, 'no-image.png', 'Rodrigo adicionou Ricardo de Paula Assis como seu nutricionista', 'Rodrigo acabou de adicionar Ricardo de Paula Assis como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=7', '08/09/2022, 21:17'),
(5, 8, 'no-image.png', 'Rogéria adicionou Ricardo de Paula Assis como seu nutricionista', 'Rogéria acabou de adicionar Ricardo de Paula Assis como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=4', '08/09/2022, 21:20'),
(6, 4, 'no-image.png', 'Rogéria adicionou Ricardo de Paula Assis como seu nutricionista', 'Rogéria acabou de adicionar Ricardo de Paula Assis como seu novo nutricionista. Que venham bons resultados!', '../perfil/perfil.php?id=8', '08/09/2022, 21:20');

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
(1, 4, 'no-image.png', 'Pedro Barboza adicionou você como seu nutricionista', 'Pedro Barboza acabou de te adicionar como seu nutricionista. Clique aqui para ver seu perfil.', '../perfil/perfil.php?id=1', '08/09/2022, 20:01', 'S'),
(2, 4, 'no-image.png', 'Rodrigo Alves adicionou você como seu nutricionista', 'Rodrigo Alves acabou de te adicionar como seu nutricionista. Clique aqui para ver seu perfil.', '../perfil/perfil.php?id=7', '08/09/2022, 21:17', 'S'),
(3, 4, 'no-image.png', 'Rogéria Matos adicionou você como seu nutricionista', 'Rogéria Matos acabou de te adicionar como seu nutricionista. Clique aqui para ver seu perfil.', '../perfil/perfil.php?id=8', '08/09/2022, 21:20', 'S'),
(4, 1, 'no-image.png', 'Sua dieta foi atualizada', 'Ricardo de Paula Assis, seu nutricionista, acabou de atualizar sua dieta. Clique aqui para vê-la.', '../dieta/cliente.php', '08/09/2022, 21:33', 'S');

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
(1, 4, 1),
(2, 4, 7),
(3, 4, 8);

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
  `CRM` varchar(11) DEFAULT NULL,
  `Cidade` varchar(64) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `Bio` varchar(256) DEFAULT NULL,
  `Estrelas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`ID`, `idUser`, `Imagem`, `Altura`, `Peso`, `Sexo`, `CPF`, `CRM`, `Cidade`, `UF`, `Bio`, `Estrelas`) VALUES
(1, 1, 'no-image.png', 180, 80, 'M', NULL, NULL, NULL, NULL, 'Olá! Eu também uso o Natureba!', 0),
(2, 2, 'no-image.png', NULL, NULL, NULL, '11111111111', '111111111AA', 'São Paulo', 'SP', 'Olá! Eu também uso o Natureba!', 0),
(3, 3, 'no-image.png', NULL, NULL, NULL, '11111111122', '111111111BB', 'Rio de Janeiro', 'RJ', 'Olá! Eu também uso o Natureba!', 0),
(4, 4, 'no-image.png', NULL, NULL, NULL, '11111111133', '111111111CC', 'Belo Horizonte', 'MG', 'Olá! Eu também uso o Natureba!', 0),
(5, 5, 'no-image.png', NULL, NULL, NULL, '11111111144', '111111111DD', 'Vitória', 'ES', 'Olá! Eu também uso o Natureba!', 0),
(6, 6, 'no-image.png', NULL, NULL, NULL, '11111111155', '111111111EE', 'Brasília', 'DF', 'Olá! Eu também uso o Natureba!', 0),
(7, 7, 'no-image.png', 170, 70, 'M', NULL, NULL, NULL, NULL, 'Olá! Eu também uso o Natureba!', 0),
(8, 8, 'no-image.png', 160, 60, 'F', NULL, NULL, NULL, NULL, 'Olá! Eu também uso o Natureba!', 0),
(9, 9, '1662685751631a9237a425f.jpg', 0, 0, '', NULL, NULL, NULL, NULL, 'Olá! Eu também uso o Natureba!', 0);

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
(1, 2, 'Exemplo', 'Esta receita é um exemplo, e esta é sua descrição.', 'WIP', 'WIP', '08/09/2022', 'no-image.png', 0),
(2, 3, 'Exemplo', 'Esta receita é um exemplo, e esta é sua descrição.', 'WIP', 'WIP', '08/09/2022', 'no-image.png', 0),
(3, 4, 'Exemplo', 'Esta receita é um exemplo, e esta é sua descrição.', 'Aqui estão descritos seus ingredientes.', 'Aqui está  descrito seu modo de preparo.', '08/09/2022', 'no-image.png', 0);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `dietas`
--
ALTER TABLE `dietas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estrelas`
--
ALTER TABLE `estrelas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `existencia`
--
ALTER TABLE `existencia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `feed`
--
ALTER TABLE `feed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `nutricionistas`
--
ALTER TABLE `nutricionistas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
