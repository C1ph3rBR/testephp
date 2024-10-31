-- --------------------------------------------------------

--
-- Estrutura da tabela `consuta` executar no http://localhost/phpmyadmin/ 
--

CREATE TABLE `consuta` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `doutor` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
