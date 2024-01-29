-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/01/2024 às 01:40
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
-- Banco de dados: `projeto01`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(62, '::1', '2024-01-28 21:38:53', '65b59ab7bf863');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'Kaique', 'admin', '6593364967abd.jpeg', 'Kaique', 2),
(7, 'Guilherme', '123', '659b398677f63.png', 'Guilherme', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(15, '::1', '2023-12-28'),
(16, '::1', '2023-12-28'),
(17, '::1', '2023-12-28'),
(18, '::1', '2023-12-28'),
(19, '::1', '2023-12-28'),
(20, '::1', '2024-01-04'),
(21, '::1', '2024-01-15'),
(22, '::1', '2024-01-27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.categorias`
--

CREATE TABLE `tb_site.categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site.categorias`
--

INSERT INTO `tb_site.categorias` (`id`, `nome`, `slug`, `order_id`) VALUES
(1, 'Esportes Aquáticos', 'esportes-aquaticos', 3),
(3, 'Skins de CS:GO ', 'skins-de-cs:go-', 0),
(4, 'Esportes', 'esportes', 4),
(5, 'Informática', 'informatica', 5),
(14, 'Noticiário', 'noticiario', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Portfólio Kaique ', 'Kaique Xavier', 'Analista de Suporte Júnior apaixonado por tecnologia e estudante de Sistemas de Informações na UFVJM. Desenvolvi este site de portfólio usando HTML, CSS, PHP, jQuery e mais, incluindo um painel de controle para atualizações dinâmicas. Busco constantemente aprender e aplicar soluções inovadoras, unindo teoria acadêmica com prática para enfrentar desafios tecnológicos.', 'fa fa-css3', 'O CSS3 é a versão avançada do CSS, oferecendo recursos poderosos para estilizar conteúdos HTML. Com ele, é possível criar layouts responsivos, adicionar animações, personalizar tipografias e aplicar efeitos visuais, impulsionando o design web para experiências mais atraentes e funcionais.', 'fa fa-html5', 'O HTML5 é a evolução do HTML, fornecendo uma base robusta para estruturar e apresentar conteúdo na web. Introduziu novos elementos semânticos, suporte a mídia, como áudio e vídeo, e APIs avançadas, permitindo uma experiência mais rica e interativa para os usuários', 'fa fa-gg-circle', 'O PHP é uma linguagem de programação amplamente utilizada para criar aplicações web dinâmicas. Poderoso e flexível, é especialmente reconhecido por sua capacidade de gerar conteúdo dinâmico, interagir com bancos de dados e oferecer suporte a uma ampla gama de funcionalidades web.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_site.depoimentos`
--

INSERT INTO `tb_site.depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
(32, 'Kaique Xavier', 'Muito bom! ', '01/01/2024', 33),
(33, 'Jhon Modas', 'Excelente equipe!', '01/01/2024', 34),
(34, 'Bruna', 'Excelente trabalho e qualidade!', '01/01/2024', 36),
(37, 'Kaique', 'Novo depoimento', '01/01/2024', 37);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.noticias`
--

CREATE TABLE `tb_site.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site.noticias`
--

INSERT INTO `tb_site.noticias` (`id`, `categoria_id`, `data`, `titulo`, `conteudo`, `capa`, `slug`, `order_id`) VALUES
(16, 14, '2024-01-28', 'Quadrilha bloqueia estrada para roubo de carga no litoral de São Paulo', '<div class=\"row content-head mc-column non-featured \">\r\n<div class=\"title\" data-block-type=\"title\" data-block-id=\"0\">\r\n<h1 class=\"content-head__title\">Quadrilha bloqueia estrada para roubo de carga no litoral de S&atilde;o Paulo</h1>\r\n</div>\r\n<div class=\"medium-centered subtitle\">\r\n<h2 class=\"content-head__subtitle\">Valor da carga era estimado em R$ 7 milh&otilde;es. O motorista foi levado como ref&eacute;m pela quadrilha, que pode ter mais de 30 membros envolvidos no assalto</h2>\r\n</div>\r\n</div>\r\n<div class=\"content__signa-share mc-column\">\r\n<div class=\"content__signature\">\r\n<div class=\"content-publication-data\">\r\n<div class=\"content-publication-data__text\">\r\n<p class=\"content-publication-data__from\" title=\"Fant&aacute;stico\">Por Fant&aacute;stico, Fant&aacute;stico</p>\r\n<p class=\"content-publication-data__from\" title=\"Fant&aacute;stico\">&nbsp;</p>\r\n<div id=\"chunk-1bdgs\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"43\" data-block-id=\"3\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">Em uma das rodovias mais movimentadas do pa&iacute;s, um comboio de criminosos fechou as pistas para cercar um caminh&atilde;o e roubar uma carga milion&aacute;ria. As cenas de cinema aconteceram esta semana em S&atilde;o Paulo e foram registradas pelas c&acirc;meras de seguran&ccedil;a do caminh&atilde;o.</p>\r\n</div>\r\n</div>\r\n<div class=\"wall protected-content\">\r\n<div id=\"chunk-73tfk\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"24\" data-block-id=\"5\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">O motorista j&aacute; havia rodado mais de 600 quil&ocirc;metros: saiu de Uberl&acirc;ndia, Minas Gerais, com destino &agrave; Praia Grande, litoral de S&atilde;o Paulo.</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-bk4ca\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"39\" data-block-id=\"6\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">Ele est&aacute; sozinho e quatro c&acirc;meras registram todo o trajeto. As imagens v&atilde;o direto para a transportadora, que monitora tudo. Em um trecho de serra da Rodovia Anchieta, pouco depois das 9h da manh&atilde;, ele percebe uma movimenta&ccedil;&atilde;o estranha.</p>\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\"><img src=\"https://tpc.googlesyndication.com/simgad/11650708576287160970\"></p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-ehsj6\">\r\n<div class=\"content-ads content-ads--reveal\" data-block-type=\"ads\" data-block-id=\"7\">\r\n<div id=\"banner_materia2\" class=\"tag-manager-publicidade-container mc-has-reveal mc-has-ad-lazyload tag-manager-publicidade-banner_materia2 tag-manager-publicidade-container--carregado tag-manager-publicidade-container--visivel\" data-id=\"banner_materia2\" data-google-query-id=\"CJnN5o2tgYQDFQMwuQYd-gMCIA\">\r\n<div id=\"google_ads_iframe_/95377733/tvg_G1/Fantastico_3__container__\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"chunk-dabs9\">\r\n<div class=\"mc-column content-text active-extra-styles\" data-block-type=\"raw\" data-block-weight=\"46\" data-block-id=\"8\">\r\n<ul class=\"content-unordered-list\">\r\n<li><a class=\"\" href=\"https://g1.globo.com/busca/click?q=assalto+anchieta&amp;p=3&amp;r=1706491142855&amp;u=https%3A%2F%2Fg1.globo.com%2Fsp%2Fsantos-regiao%2Fnoticia%2F2024%2F01%2F24%2Fmotorista-sequestrado-em-mega-assalto-na-via-anchieta-fez-viagem-de-130-km-com-criminoso-no-colo.ghtml&amp;syn=False&amp;key=b8aaa177d658263e2c3a9b64ba5bdd94\"><strong>Motorista sequestrado em assalto na Anchieta fez viagem de 130 km com criminoso no colo</strong></a></li>\r\n<li><a class=\"\" href=\"https://g1.globo.com/busca/click?q=assalto+anchieta&amp;p=1&amp;r=1706491142851&amp;u=https%3A%2F%2Fgloboplay.globo.com%2Fv%2F12296334%2F&amp;syn=False&amp;key=f93aba0c1ddb9dff1fb2778d03c29ad2\"><strong>Imagens mostram a&ccedil;&atilde;o de criminosos durante mega assalto na Via Anchieta</strong></a></li>\r\n<li><a class=\"\" href=\"https://g1.globo.com/busca/click?q=assalto+anchieta&amp;p=4&amp;r=1706491142857&amp;u=https%3A%2F%2Fg1.globo.com%2Fsp%2Fsantos-regiao%2Fnoticia%2F2024%2F01%2F24%2Fmega-assalto-com-mortos-e-presos-na-via-anchieta-foi-feito-por-quadrilha-especializada-e-contou-com-estrategia-de-policiais-na-mata-diz-tenente.ghtml&amp;syn=False&amp;key=28b4a0892f4dd349cbf8a3a73428a91f\"><strong>Assalto com mortos e presos na Anchieta foi feito por quadrilha especializada e contou com estrat&eacute;gia de policiais na mata</strong></a></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-1be3d\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"48\" data-block-id=\"9\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">Um pequeno caminh&atilde;o branco o ultrapassa e um carro preto, outro carro branco, uma van e outros dois pequenos caminh&otilde;es se alinham como num comboio atr&aacute;s dele. S&atilde;o quase quatro minutos assim, at&eacute; que o carro preto come&ccedil;a a piscar luzes, como se fosse uma viatura da pol&iacute;cia.</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-2q7vd\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"58\" data-block-id=\"10\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">O caminh&atilde;o que fez a ultrapassagem agora dirige em zigue e zague. O motorista tenta fugir. O caminh&atilde;o freia bem na frente dele. O carro preto fecha a outra pista. O motorista ainda tenta escapar e chega a bater de leve em outro carro da quadrilha. Nesse momento, homens armados anunciam o assalto de dentro dos dois carros.</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-fgbb7\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"67\" data-block-id=\"11\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">O motorista levanta as m&atilde;os, se rende e &eacute; obrigado a seguir o carro preto. Ao fazer uma manobra, nenhum carro ou caminh&atilde;o passa pela rodovia. Segundo a pol&iacute;cia, a quadrilha havia bloqueado um dos t&uacute;neis da estrada. Ap&oacute;s 10 minutos dirigindo, o motorista &eacute; obrigado a desligar o equipamento de grava&ccedil;&atilde;o. A carga de cigarros que ele transportava, estava avaliada em mais de R$ 7 milh&otilde;es.</p>\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">&nbsp;</p>\r\n<div id=\"chunk-ci75f\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"11\" data-block-id=\"13\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">Em cerca de 20 minutos, come&ccedil;a o confronto com a pol&iacute;cia.</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-334qf\">\r\n<div class=\"mc-column content-text active-extra-styles\" data-block-type=\"raw\" data-block-weight=\"22\" data-block-id=\"14\">\r\n<p class=\"content-text__container\">&nbsp;</p>\r\n<blockquote class=\"content-blockquote theme-border-color-primary-before\">&ldquo;Foi uma a&ccedil;&atilde;o muito ousada da parte dos criminosos&rdquo;, afirma o major da Pol&iacute;cia Rodovi&aacute;ria Estadual Rafael Cambui, que acompanhou a opera&ccedil;&atilde;o.</blockquote>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-8cl01\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"59\" data-block-id=\"15\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">Em uma estrada lateral, houve uma troca de tiros e alguns bandidos tentaram escapar pela mata. No confronto, tr&ecirc;s integrantes da quadrilha foram mortos. Ao todo, a opera&ccedil;&atilde;o teve 17 presos, entre eles um ex-funcion&aacute;rio da fabricante dos cigarros que estavam no caminh&atilde;o. Mas o n&uacute;mero total de bandidos que participaram da tentativa de assalto pode passar de 30.</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-b8mnf\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"31\" data-block-id=\"16\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">Ap&oacute;s a chegada da pol&iacute;cia, o motorista foi levado como ref&eacute;m por 5 assaltantes. Ele foi liberado duas horas depois, mas esses criminosos ainda est&atilde;o foragidos. Toda a carga foi recuperada.</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-1ehal\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"43\" data-block-id=\"17\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">O motorista, agora, se recupera do susto. A empresa dona do caminh&atilde;o &eacute; uma transportadora do Rio Grande do Sul. No depoimento do motorista &agrave; pol&iacute;cia, ele contou que os criminosos pensaram em atear fogo no caminh&atilde;o, mas n&atilde;o deu tempo.</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-1pism\">\r\n<div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"33\" data-block-id=\"18\">\r\n<p class=\" content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\">Em junho do ano passado, em uma reportagem do Fant&aacute;stico sobre roubo de cargas, essa mesma empresa mostrou que faz palestras para orientar os motoristas sobre como se comportar em situa&ccedil;&otilde;es de risco.</p>\r\n</div>\r\n</div>\r\n<div id=\"chunk-c658u\">\r\n<div class=\"mc-column content-text active-extra-styles\" data-block-type=\"raw\" data-block-weight=\"5\" data-block-id=\"19\">\r\n<p class=\"content-text__container\">&nbsp;</p>\r\n<div class=\"content-intertitle\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"chunk-3vggb\">\r\n<div class=\"content-ads content-ads--reveal\" data-block-type=\"ads\" data-block-id=\"12\">\r\n<div id=\"banner_materia__f0e34922-0a39-4d99-8c68-3b58ccb929db\" class=\"tag-manager-publicidade-container mc-has-reveal mc-has-ad-lazyload tag-manager-publicidade-banner_materia__f0e34922-0a39-4d99-8c68-3b58ccb929db tag-manager-publicidade-container--carregado tag-manager-publicidade-container--visivel\" data-id=\"banner_materia__f0e34922-0a39-4d99-8c68-3b58ccb929db\" data-google-query-id=\"CMnSqI6tgYQDFVyBYQYdn6wOuA\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '65b6f35714ee9.png', 'quadrilha-bloqueia-estrada-para-roubo-de-carga-no-litoral-de-sao-paulo', 16);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_site.servicos`
--

INSERT INTO `tb_site.servicos` (`id`, `servico`, `order_id`) VALUES
(9, 'Criação de E-commerces', 10),
(10, 'Criação de Landing Pages', 11),
(11, 'Sistemas de Delivery', 12),
(12, 'Sites Institucional', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site.slides`
--

CREATE TABLE `tb_site.slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_site.slides`
--

INSERT INTO `tb_site.slides` (`id`, `nome`, `slide`, `order_id`) VALUES
(16, 'slidePrincipal', '6593383248367.jpg', 16),
(17, 'slide2', '659348babf989.jpg', 17);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
