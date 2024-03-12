SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ppur
-- -----------------------------------------------------

CREATE DATABASE IF NOT EXISTS ppur DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ppur`;

-- -----------------------------------------------------
-- Table `ppur`.`noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ppur`.`noticia` (
  `not_id` INT NOT NULL AUTO_INCREMENT,
  `not_data` DATE NULL,
  `not_hora` TIME NULL,
  `not_titulo` VARCHAR(100) NULL,
  `not_texto` TEXT(7000) NULL,
  `not_image-link` VARCHAR(100) NULL,
  PRIMARY KEY (`not_id`)
  );

-- -----------------------------------------------------
-- Table `ppur`.`adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ppur`.`adm` (
  `adm_id` INT NOT NULL,
  `adm_user` VARCHAR(45) NOT NULL,
  `adm_nome` VARCHAR(50) NOT NULL,
  `adm_email` VARCHAR(50) NOT NULL,
  `adm_senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`adm_id`)
  );

-- -----------------------------------------------------
-- Table `ppur`.`curriculo`
-- -----------------------------------------------------

  CREATE TABLE IF NOT EXISTS `ppur`.`curriculo-endereco` (
  `cur-end_id` INT NOT NULL AUTO_INCREMENT,
  `cur-end_endereco` VARCHAR(50) NOT NULL,
  `cur-end_numero` INT(4) NOT NULL,
  `cur-end_cep` INT(8) NOT NULL,
  `cur-end_complemento` VARCHAR(45) NULL,
  `cur-end_bairro` VARCHAR(45) NOT NULL,
  `cur-end_uf` CHAR(2) NOT NULL,
  `cur-end_cidade` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cur-end_id`)
  );

-- -----------------------------------------------------
-- Table `ppur`.`curriculo-objetivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ppur`.`curriculo-objetivos` (
  `cur-obj_id` INT NOT NULL AUTO_INCREMENT,
  `cur-obj_cargo` VARCHAR(45) NOT NULL,
  `cur-obj_funcao` VARCHAR(45) NOT NULL,
  `cur-obj_experiencia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cur-obj_id`)
  );

-- -----------------------------------------------------
-- Table `ppur`.`curriculo-formacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ppur`.`curriculo-formacao` (
  `cur-form_id` INT NOT NULL AUTO_INCREMENT,
  `cur-form_escolaridade` VARCHAR(45) NULL,
  `cur-form_curso` VARCHAR(45) NULL,
  `cur-form_duracao` VARCHAR(45) NULL,
  `cur-form_instituicao` VARCHAR(45) NULL,
  `cur-form_tipo-formacao` VARCHAR(45) NULL,
  `cur-form_ano-conclusao` int(4) NULL,
  PRIMARY KEY (`cur-form_id`)
);

-- -----------------------------------------------------
-- Table `ppur`.`curriculo-historico`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `ppur`.`curriculo-historico` (
  `cur-his_id` INT NOT NULL AUTO_INCREMENT,
  `cur-his_empresa` VARCHAR(45) NULL,
  `cur-his_cargo` VARCHAR(45) NULL,
  `cur-his_duracao` VARCHAR(45) NULL,
  `cur-his_desc` TEXT(1000) NULL,
  PRIMARY KEY (`cur-his_id`)
);

-- -----------------------------------------------------
-- Table `ppur`.`curriculo`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `ppur`.`curriculo` (
  `cur_id` INT NOT NULL AUTO_INCREMENT,
  `cur_nome` VARCHAR(50) NOT NULL,
  `cur_cpf` INT(11) NOT NULL,
  `cur_facebook` VARCHAR(50) NULL,
  `cur_email` VARCHAR(50) NOT NULL,
  `cur_est-civil` VARCHAR(50) NOT NULL,
  `cur_sexo` VARCHAR(45) NOT NULL,
  `cur_naturalidade` VARCHAR(50) NOT NULL,
  `cur_data-nascimento` DATE NOT NULL,
  `cur_telefone` INT(11) NOT NULL,
  `cur_qtd-filhos` INT(1) NOT NULL,
  `cur-end_id` INT NOT NULL,
  `cur-obj_id` INT NOT NULL,
  `cur-form_id` INT NOT NULL,
  `cur-his_id` INT NOT NULL,
  PRIMARY KEY (`cur_id`),
  FOREIGN KEY (`cur-end_id`) REFERENCES `curriculo-endereco` (`cur-end_id`),
  FOREIGN KEY (`cur-obj_id`) REFERENCES `curriculo-objetivos` (`cur-obj_id`),
  FOREIGN KEY (`cur-form_id`) REFERENCES `curriculo-formacao` (`cur-form_id`),
  FOREIGN KEY (`cur-his_id`) REFERENCES `curriculo-historico` (`cur-his_id`)
);

CREATE TABLE `ppur`.`ouvidoria` (
  `ouv_id` int(5) NOT NULL AUTO_INCREMENT,
  `ouv_nome` varchar(30) NOT NULL,
  `ouv_email` varchar(30) NOT NULL,
  `ouv_telefone` varchar(11) NOT NULL,
  `ouv_motivo` int(1) NOT NULL,
  `ouv_mensagem` varchar(1000) NOT NULL,
  PRIMARY KEY (`ouv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO adm(adm_id, adm_user, adm_nome, adm_email, adm_senha) VALUES (1, 'ZeroUm', 'Jos� Ulisses Adenilson Soares', 'joseulissesades@hotmail.com', '8843028fefce50a6de50acdf064ded27');

INSERT INTO adm(adm_id, adm_user, adm_nome, adm_email, adm_senha) VALUES (2, 'ZeroDois', 'Maria Josefa da Silva Bragan�a', 'marijosesibra@hotmail.com', 'c33716eebbf83d422531970fc80ca677');

insert into noticia(not_id,not_titulo,not_texto,`not_image-link`,not_data,not_hora) VALUES (4,'NOTA DE ESCLARECIMENTO SOBRE O DESLIGAMENTO DE COLABORADORES
','A COMPANY - TUR TRANSPORTES E TURISMO LTDA (PRUDENTE URBANO), empresa privada do ramo de transporte de passageiros, com sede no munic�pio de Presidente Prudente, Estado de S�o Paulo, vem respeitosamente frente a popula��o prudentina, por meio de seu representante que ao final subscreve, prestar esclarecimentos em aten��o a not�cia veiculada pelas redes de comunica��o a respeito do desligamento de colaboradores na data de 21 e 22/05/2020.

Inicialmente cabe informar que a empresa �Prudente Urbano� tem compromisso primeiro com a popula��o e com o desenvolvimento da cidade de Presidente Prudente/SP, e n�o se limita a fazer campanha pol�tica.

Contudo, vale destacar que o momento vivenciado � excepcional, tendo em vista a pandemia gerada pelo coronav�rus sem precedentes em nossa hist�ria recente. Devidamente reconhecido pela Organiza��o Mundial de Sa�de, e pelas Autoridades Federais, Estaduais e Municipais do pa�s.

Ademais, apesar de todos os esfor�os empregados pela administra��o da empresa para que o contrato de trabalho de seus colaboradores n�o fosse atingido pela crise, a compreens�vel medida adotada pelo Estado e Munic�pio de promover a paralisa��o das escolas, com�rcio, empresas e tantos outros segmentos locais, consequentemente inviabilizou a continuidade das atividades da empresa na mesma estrutura.

Nesse sentido, diante do cen�rio da pandemia, muitas empresas frente as suas dificuldades, adotaram a medida de desligamento j� no m�s de mar�o e abril de 2020, conforme � poss�vel verificar junto ao CAGED (cadastro geral de empregados e desempregados), e tamb�m j� notificado pelas m�dias do pa�s. Contudo, a administra��o da Prudente Urbano em respeito �s fam�lias que contribuem para o funcionamento da empresa e manuten��o da atividade no munic�pio, relutou em tomar tal medida, pois sempre acreditou que toda essa crise iria passar, e manteve vigente o contrato de trabalho de seus colaboradores. 

Entretanto, diante de todos os reflexos c�veis e financeiros que atingiram a empresa nesses �ltimos meses, sustentar essa medida se tornou invi�vel, tendo em vista a paralisa��o de algumas linhas, a determina��o judicial para aumentar o n�mero de ve�culos em circula��o, redu��o de passageiros transportados por ve�culo e principalmente pela falta de manifesta��o da autoridade municipal sobre sua correspondente contrapartida, muito embora a decis�o estabele�a responsabilidade solid�ria entre munic�pio e empresa.

Desse modo, em respeito e responsabilidade que temos com cada colaborador, e tamb�m ao compromisso que temos com a sociedade de Presidente Prudente, atendo-se a legisla��o vigente, respeitando a legisla��o trabalhista, a empresa foi obrigada a se reestruturar nesse momento de crise gerado pelo coronav�rus e pelo impacto operacional mencionado, para conseguir permanecer minimamente em funcionamento. Assim, foi necess�rio promover a consequente redu��o, para viabilizar a preserva��o, manuten��o e continuidade de mais de 200 empregos gerados ao munic�pio. 

Certo da compreens�o de todos pelo momento coletivo de dificuldade vivenciado, agradecemos e reafirmamos nosso compromisso com o munic�pio de Presidente Prudente.

Presidente Prudente/SP, 21 de maio de 2020.

COMPANY � TUR TRANSPORTES E TURISMO LTDA','img/noticias/not_4.png','2020-05-21','18:51:00');

insert into noticia(not_id,not_titulo,not_texto,`not_image-link`,not_data,not_hora) VALUES (3,'Nota de Esclarecimento','A Prudente Urbano vem a p�blico esclarecer que desde o in�cio da pandemia de COVID-19 sofre reflexos dr�sticos em sua opera��o di�ria e luta para manter seus compromissos com nossos usu�rios e colaboradores. No entanto, a perda superior a 80% de nossos passageiros � algo imprevis�vel e que reflete imediatamente em nossos compromissos financeiros diariamente.

Compreendemos os transtornos que a opera��o emergencial representa na vida de cada passageiro e lamentamos por isso. Nossos passageiros s�o nossa prioridade essencial, e somente por essa raz�o nossos servi�os est�o sendo mantidos.

Esta � uma circunst�ncia nunca vivida por n�s e o transporte em Presidente Prudente, diferentemente de muitas cidades n�o parou por nenhum dia. Estamos oferecendo transporte ao longo dessas semanas a um custo muito elevado e nossa arrecada��o n�o � suficiente para mantermos, sozinhos, o transporte como gostar�amos. Lamentamos o transtorno mas viemos a p�blico explicar que estamos trabalhando arduamente para manter o servi�o essencial em nossa cidade. Embora tardiamente, as informa��es s�o divulgadas assim que poss�vel, mas entendemos e temos ouvido cada uma das queixas que nos s�o apresentadas.

Nossa atua��o � limitada mas nosso maior objetivo � manter e honrar uma opera��o emergencial que possa mesmo que de forma insuficiente, atender as principais demandas.

Agradecemos a colabora��o de cada usu�rio e institui��o que nos procura e sinaliza suas necessidades, e esclarecemos que todos s�o ouvidos com empatia e que a coletividade � priorizada no transporte p�blico.

Esperamos a compreens�o de todos.
','img/noticias/not_3.jpg','2020-03-27','09:26:00');

insert into noticia(not_id,not_titulo,not_texto,`not_image-link`,not_data,not_hora) VALUES (2,'Altera��o tempor�ria de itiner�rio','A partir de amanh� (17/03), alguns dos nossos �nibus especiais deixar�o de circular temporariamente. Fique ligado e n�o esque�a.


Per�odo da manh�:

Linha 102 S�o Lucas x Hospital Regional � 6h15 saindo do S�o Lucas

Linha 111 Ana Jacinta x Vila Furquim � 5h55 saindo do Ana Jacinta

Linha 112 Ana Jacinta x Jo�o Domingos � 6h05 saindo do Jo�o Domingos

Linha 128 Brasil Novo x Distrito Industrial e Col�gio Agr�cola- 6h20 saindo do Brasil Novo

Linha 129 Brasil Novo x COHAB � 6h30 saindo do 3� Mil�nio','img/noticias/not_2.png','2020-03-16','18:51:00');

insert into noticia(not_id,not_titulo,not_texto,`not_image-link`,not_data,not_hora) VALUES (1,'Para voc� que perdeu o prazo de recadastramento ou cadastramento','
Se voc� que perdeu o prazo de recadastramento ou cadastramento e precisa efetuar o cadastro ou recadastro do Passe Social, v� primeiramente � SEDUC para conferir os documentos exigidos. O endere�o � na Rua Cyro Bueno, 96, Jardim Morumbi. Ap�s a verifica��o com aprova��o, basta ir para o PPU finalizar o processo.','img/noticias/not_1.png','2020-02-05','10:24:00');