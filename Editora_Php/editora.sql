# Host: localhost  (Version: 5.7.11-log)
# Date: 2016-06-10 20:31:56
# Generator: MySQL-Front 5.3  (Build 5.20)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "edt_autor"
#

DROP TABLE IF EXISTS `edt_autor`;
CREATE TABLE `edt_autor` (
  `CODAUTOR` int(11) NOT NULL AUTO_INCREMENT,
  `CPF` varchar(11) DEFAULT NULL,
  `AREALITERARIA` varchar(20) DEFAULT NULL,
  `FORMACAO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CODAUTOR`),
  KEY `EDT_AUTOR_INDEX1` (`CPF`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "edt_autor"
#

INSERT INTO `edt_autor` VALUES (1,'96345687499','Sport','Educação Física'),(2,'54269552808','Biografias','Jornalismo'),(3,'69745212555','Dramatologia','Ator'),(4,'36502314171','Legislacao','Direito'),(5,'16575600743','Culinaria','Gastronomia'),(6,'14080754060','Auto Ajuda','Piscicologiaa'),(7,'32169285658','Documentarios','Jornalismo'),(8,'05526599999','RomanceE','Cineastra');

#
# Structure for table "edt_comercializa"
#

DROP TABLE IF EXISTS `edt_comercializa`;
CREATE TABLE `edt_comercializa` (
  `CNPJ` varchar(14) NOT NULL,
  `CODDEP` tinyint(4) NOT NULL,
  `CODEXEM` smallint(6) NOT NULL,
  PRIMARY KEY (`CNPJ`,`CODDEP`,`CODEXEM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "edt_comercializa"
#

INSERT INTO `edt_comercializa` VALUES ('10532601000953',25,11),('26697893000262',25,20),('26697893000262',25,25),('27342349000918',25,21),('27342349000918',25,22),('62341110000793',25,16),('62341110000793',25,18),('62341110000793',25,19),('62341110000793',25,20),('62341110000793',25,22),('62341110000793',25,24),('62341110000793',25,26),('68011150000076',25,23),('76769788000795',25,10),('76769788000795',25,12),('76769788000795',25,14),('76769788000795',25,15),('76769788000795',25,17),('76769788000795',25,21),('78127214000634',25,13),('78127214000634',25,19);

#
# Structure for table "edt_cria"
#

DROP TABLE IF EXISTS `edt_cria`;
CREATE TABLE `edt_cria` (
  `CPF` varchar(11) NOT NULL,
  `CODEXEM` smallint(6) NOT NULL,
  PRIMARY KEY (`CPF`,`CODEXEM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "edt_cria"
#

INSERT INTO `edt_cria` VALUES ('08401894086',12),('08401894086',13),('08401894086',26),('14080754060',24),('14080754060',25),('16575600743',10),('16575600743',11),('28353529459',22),('28353529459',23),('32169285658',14),('32169285658',20),('32169285658',21),('36502314171',18),('36502314171',19),('54269552808',14),('54269552808',15),('81204148538',16),('81204148538',17);

#
# Structure for table "edt_departamento"
#

DROP TABLE IF EXISTS `edt_departamento`;
CREATE TABLE `edt_departamento` (
  `NOMEDEP` varchar(30) NOT NULL,
  `CODDEP` tinyint(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`CODDEP`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

#
# Data for table "edt_departamento"
#

INSERT INTO `edt_departamento` VALUES ('RH',10),('Marketing',15),('Finaceiro',20),('Vendas',25),('Gerencia',30),('Grafica',35),('ArteCriacao',40),('Juridico',45),('Brigada',82),('Tesouraria_A',83);

#
# Structure for table "edt_estados"
#

DROP TABLE IF EXISTS `edt_estados`;
CREATE TABLE `edt_estados` (
  `CODIGO` smallint(6) NOT NULL,
  `SIGLA` varchar(2) NOT NULL,
  `NOME` varchar(20) NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "edt_estados"
#

INSERT INTO `edt_estados` VALUES (1,'AC','Acre'),(2,'AL','Alagoas'),(3,'AM','Amazonas'),(4,'AP','Amapá'),(5,'BA','Bahia'),(6,'CE','Ceará'),(7,'DF','Distrito Federal'),(8,'ES','Espírito Santo'),(9,'GO','Goiás'),(10,'MA','Maranhão'),(11,'MG','Minas Gerais'),(12,'MS','Mato Grosso do Sul'),(13,'MT','Mato Grosso'),(14,'PA','Pará'),(15,'PB','Paraíba'),(16,'PE','Pernambuco'),(17,'PI','Piauí'),(18,'PR','Paraná'),(19,'RJ','Rio de Janeiro'),(20,'RN','Rio Grande do Norte'),(21,'RO','Rondônia'),(22,'RR','Roraima'),(23,'RS','Rio Grande do Sul'),(24,'SC','Santa Catarina'),(25,'SE','Sergipe'),(26,'SP','São Paulo'),(27,'TO','Tocantins');

#
# Structure for table "edt_exemplar"
#

DROP TABLE IF EXISTS `edt_exemplar`;
CREATE TABLE `edt_exemplar` (
  `CODEXEMPLAR` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(36) NOT NULL,
  `NUMPAGINAS` int(11) NOT NULL DEFAULT '0',
  `TIPO` varchar(25) NOT NULL,
  PRIMARY KEY (`CODEXEMPLAR`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Data for table "edt_exemplar"
#

INSERT INTO `edt_exemplar` VALUES (10,'Revolucao na Cozinha',65,'Culinaria e Gastronomia'),(11,'Alimentos à Base de Soja',70,'Culinaria e Gastronomia'),(12,'Programação com PHP 5.3',189,'Informatica'),(13,'SQL Server 2008 Curso Completo',231,'Informatica'),(14,'Einstein - Sua Vida, seu Universo ',145,'Biografias'),(15,'Marie Curie - Uma Vida',197,'Biografias'),(16,'Macroeconomia ',98,'Econimia'),(17,'Economia Monetária e Financeira',115,'Economia'),(18,'RESUMO DE LEGISLAÇÃO DE TRÂNSITO',108,'Legislacao'),(19,'UTILIZAÇÃO DIARIA DO CÓDIGO',187,'Legislacao'),(20,'DOCUMENTARIO DE EDUARDO COUTINHO',121,'Documentario'),(21,'O Livro do Desasossego',182,'Documentario'),(22,'Caçador de Pipas',243,'Romance'),(23,'Guia Mochileiro Das Galaxias',321,'Ficcao'),(24,'A Cabana',159,'Auto Ajuda'),(25,'O Efeito Sombra',250,'Auto Ajuda'),(26,'Manual do Aloprador',666,'Informal');

#
# Structure for table "edt_funcionario"
#

DROP TABLE IF EXISTS `edt_funcionario`;
CREATE TABLE `edt_funcionario` (
  `SALARIO` double DEFAULT NULL,
  `CARGO` varchar(30) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `CODDEP` tinyint(4) DEFAULT NULL,
  `CODFUN` smallint(6) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`CODFUN`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

#
# Data for table "edt_funcionario"
#

INSERT INTO `edt_funcionario` VALUES (4000,'Coordenador','29262439520',40,1),(3000,'Coordenador','65057396536',15,2),(3000,'Coordenador','46058418143',20,3),(3000,'Coordenador','16884831952',25,4),(3000,'Coordenador','46322531972',30,5),(3000,'Coordenador','84804783229',35,6),(3000,'Coordenador','19640491802',40,7),(3000,'Coordenador','43354783800',45,8),(1000,'Gestor','28741323572',15,9),(1000,'Gestor','84386126368',20,10),(1000,'Gestor','36178367716',25,11),(1000,'Gestor','28425758068',30,12),(1000,'Gestor','78756785364',35,13),(1000,'Gestor','51306844193',40,14),(1000,'Gestor','73224642419',10,15),(1000,'Gestor','78104457680',15,16),(1000,'Gestor','84903568432',20,17),(1000,'Gestor','76730971950',25,18),(1000,'Gestor','73870076081',30,19),(1000,'Gestor','03939989925',45,20),(1000,'Gestor','02835602859',40,21),(1000,'Gestor','04427098273',10,22),(1000,'Gestor','53115616104',20,23),(1000,'Gestor','13222241376',10,24),(1000,'Gestor','09855125479',15,25),(1000,'Gestor','34734600449',25,26),(1000,'Gestor','66188452899',30,27),(1000,'Gestor','43786916985',35,28),(1000,'Gestor','11356318240',40,29),(1000,'Gestor','65524480235',40,30),(963000,'Gerente','05526567478',83,39);

#
# Structure for table "edt_livraria"
#

DROP TABLE IF EXISTS `edt_livraria`;
CREATE TABLE `edt_livraria` (
  `CODLIVRARIA` smallint(6) NOT NULL AUTO_INCREMENT,
  `CNPJ` varchar(14) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `ESTADO` varchar(2) NOT NULL,
  `CIDADE` varchar(60) NOT NULL,
  `LOGRADOURO` varchar(60) NOT NULL,
  `CEP` int(11) NOT NULL,
  PRIMARY KEY (`CODLIVRARIA`),
  KEY `EDT_LIVRARIA_INDEX1` (`CNPJ`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "edt_livraria"
#

INSERT INTO `edt_livraria` VALUES (1,'76769788000795','Livraria Saraiva','PE','Olinda','Av Carlos de Lima Cavalcante',52343000),(2,'82713857000859','Livraria Cultura','PE','Recife','Av Caxanga',50373010),(3,'66869897000863','Livraria Modelo','PE','Paulista','Rua Lagoa dos Gatos',53417330),(4,'62341110000793','Livraria Imperatriz','PE','Recife','Av Boa Viagem',50383010),(5,'41736421000398','Livraria Galileu','PE','Olinda','Av Beira Mar',52383220),(6,'25704491000864','Livraria Espiritas','PE','Recife','Av Rosa e Silva',50303010),(7,'10532601000953','Livraria Nobel','CE','Aracaju','Rua Luiz Canolo de Noronha',49097270),(8,'68011150000076','Livraria Do Advogado','AL','Maceio','Rua Sá e Albuquerque',57025120),(9,'78127214000634','Livraria Osorio','PB','João Pessoa','Praça Pedro Américo',58010970),(10,'26697893000262','Livraria Loyola','RN','Natal','Av Presidente Café Filho',59010000),(11,'27342349000918','Livraria Cortez','PE','Jaboatao dos Guararapes','Av General Barreto de Menezes',54423050);

#
# Structure for table "edt_pessoa"
#

DROP TABLE IF EXISTS `edt_pessoa`;
CREATE TABLE `edt_pessoa` (
  `CODPESSOA` smallint(6) NOT NULL AUTO_INCREMENT,
  `CPF` varchar(11) DEFAULT NULL,
  `NOME` varchar(30) DEFAULT NULL,
  `ESTADO` varchar(2) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `LOGRADOURO` varchar(80) DEFAULT NULL,
  `CEP` int(11) DEFAULT NULL,
  PRIMARY KEY (`CODPESSOA`),
  UNIQUE KEY `PESSOA_PK` (`CODPESSOA`),
  KEY `EDT_PESSOA_INDEX1` (`CPF`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;

#
# Data for table "edt_pessoa"
#

INSERT INTO `edt_pessoa` VALUES (40,'28353529459','Wiayada O. Serrano','PB','Recife','Av Boa Viagem',50383010),(41,'29262439520','Nerea R. Pitts','PE','Olinda','Av Beira Mar',52383220),(42,'65057396536','Phyllis T. Peterson','PE','Olinda','Av Getulio Vargas',52383000),(43,'46058418143','Bernard Q. Ray','PE','Recife','Av Rosa e Silva',50303010),(44,'16884831952','Jade P. Fowler','PE','Cabo S. A.','Av Ministro André Cavalcante',54505904),(45,'46322531972','Luke C. Castro','PB','Joao Pessoa','Praça Pedro Américo',58010970),(46,'54269552808','Wang O. Hodges','AL','Maceio','Rua Sá e Albuquerque',57025120),(47,'84804783229','Hannah X. Hoover','PE','Paulista','Rua João Pereira de Oliveira',53423430),(48,'19640491802','Buffy S. Lopez','PE','Paulista','Rua Djalma Dutra',53434220),(49,'81204148538','Justina K. Cross','SE','Aracaju','Rua Luiz Canolo de Noronha',49097270),(50,'43354783800','Charles L. Cain','PE','Recife','Rua dos Navegantes',50383010),(51,'36502314171','Inez O. Frost','BA','Salvador','Avenida Sete de Setembro',40140110),(52,'16575600743','Desiree W. Garza','RN','Natal','Av Presidente Café Filho',59010000),(53,'28741323572','Farrah I. Whitaker','PE','Jaboatao dos Guararapes','Av Presidente Castelo Branco',54440050),(54,'84386126368','Keefe D. Craig','PE','Cabo','Rua Amaro Pereira Cavalcante',53505904),(55,'28425758068','Naomi B. Dillard','PE','Paulista','Rua Lagoa dos Gatos',53417330),(56,'14080754060','Timothy I. Morton','PE','Jaboatao dos Guararapes','Av General Barreto de Menezes',54423050),(57,'78756785364','Avye D. Mercer','PE','Recife','Av Caxanga',50373010),(58,'51306844193','Aileen W. Long','PE','Olinda','Av Carlos de Lima Cavalcante',52343000),(59,'73224642419','Stephen S. Gates','PE','Timbaúba','Rua da Cruz',55860000),(60,'78104457680','Maxine B. Lewis','PB','Joao Pessoa','Praça Pedro Américo',58010970),(61,'84903568432','Darrel W. Church','PB','Joao Pessoa','Praça Pedro Américo',58010970),(62,'32169285658','Fritz Z. Mcclain','SE','Aracaju','Rua Luiz Canolo de Noronha',49097270),(63,'76730971950','Hasad J. Martin','BA','Salvador','Avenida Sete de Setembro',40140110),(64,'73870076081','Griffith P. Potter','PE','Olinda','Av Carlos de Lima Cavalcante',52343000),(65,'03939989925','Risa S. Vaughn','BA','Salvador','Avenida Sete de Setembro',40140110),(66,'53115616104','Darrel W. Vaughn','SE','Aracaju','Rua Luiz Canolo de Noronha',49097270),(67,'13222241376','Timothy P. Potter','PE','Olinda','Av Carlos de Lima Cavalcante',52343000),(68,'09855125479','Hasad J. Mcclain','AL','Maceio','Rua Sá e Albuquerque',57025120),(69,'34734600449','João da Silva','BA','Salvador','Avenida Sete de Setembro',40140110),(70,'66188452899','Joquaquim Ferreira','SE','Aracaju','Rua Luiz Canolo de Noronha',49097270),(71,'43786916985','Debora Nunes','AL','Maceio','Rua Sá e Albuquerque',57025120),(72,'11356318240','Dragão Correia','BA','Salvador','Avenida Sete de Setembro',40140110),(73,'65524480235','Charlinho Rego Pinto','PE','Recife','Rua dos Navegantes',50383010),(89,'05526567478','jonatas','PE','Vitória de Santo Antão','rua da cruz',55608210),(177,'05526567478','Ronaldo Pontes Pessoa Filho','PE','Vitória de Santo Antão','Rua Paraguaçu 29',55608210),(182,'02269877744','Luciene','PE','VISA','Rua Do Caja',5547888);

#
# Structure for table "edt_usuario"
#

DROP TABLE IF EXISTS `edt_usuario`;
CREATE TABLE `edt_usuario` (
  `CODUSUARIO` smallint(6) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(20) DEFAULT NULL,
  `SENHA` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `USUARIO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CODUSUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

#
# Data for table "edt_usuario"
#

INSERT INTO `edt_usuario` VALUES (21,'ronaldo','123','ronaldo@hotmail.com','ronalld'),(22,'Luciene','123','luciene.silva@hotmail.com','lulu');
