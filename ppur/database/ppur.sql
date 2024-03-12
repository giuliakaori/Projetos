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

INSERT INTO adm(adm_id, adm_user, adm_nome, adm_email, adm_senha) VALUES (1, 'ZeroUm', 'José Ulisses Adenilson Soares', 'joseulissesades@hotmail.com', '8843028fefce50a6de50acdf064ded27');

INSERT INTO adm(adm_id, adm_user, adm_nome, adm_email, adm_senha) VALUES (2, 'ZeroDois', 'Maria Josefa da Silva Bragança', 'marijosesibra@hotmail.com', 'c33716eebbf83d422531970fc80ca677');

insert into noticia(not_id,not_titulo,not_texto,`not_image-link`,not_data,not_hora) VALUES (4,'NOTA DE ESCLARECIMENTO SOBRE O DESLIGAMENTO DE COLABORADORES
','A COMPANY - TUR TRANSPORTES E TURISMO LTDA (PRUDENTE URBANO), empresa privada do ramo de transporte de passageiros, com sede no município de Presidente Prudente, Estado de São Paulo, vem respeitosamente frente a população prudentina, por meio de seu representante que ao final subscreve, prestar esclarecimentos em atenção a notícia veiculada pelas redes de comunicação a respeito do desligamento de colaboradores na data de 21 e 22/05/2020.

Inicialmente cabe informar que a empresa “Prudente Urbano” tem compromisso primeiro com a população e com o desenvolvimento da cidade de Presidente Prudente/SP, e não se limita a fazer campanha política.

Contudo, vale destacar que o momento vivenciado é excepcional, tendo em vista a pandemia gerada pelo coronavírus sem precedentes em nossa história recente. Devidamente reconhecido pela Organização Mundial de Saúde, e pelas Autoridades Federais, Estaduais e Municipais do país.

Ademais, apesar de todos os esforços empregados pela administração da empresa para que o contrato de trabalho de seus colaboradores não fosse atingido pela crise, a compreensível medida adotada pelo Estado e Município de promover a paralisação das escolas, comércio, empresas e tantos outros segmentos locais, consequentemente inviabilizou a continuidade das atividades da empresa na mesma estrutura.

Nesse sentido, diante do cenário da pandemia, muitas empresas frente as suas dificuldades, adotaram a medida de desligamento já no mês de março e abril de 2020, conforme é possível verificar junto ao CAGED (cadastro geral de empregados e desempregados), e também já notificado pelas mídias do país. Contudo, a administração da Prudente Urbano em respeito às famílias que contribuem para o funcionamento da empresa e manutenção da atividade no município, relutou em tomar tal medida, pois sempre acreditou que toda essa crise iria passar, e manteve vigente o contrato de trabalho de seus colaboradores. 

Entretanto, diante de todos os reflexos cíveis e financeiros que atingiram a empresa nesses últimos meses, sustentar essa medida se tornou inviável, tendo em vista a paralisação de algumas linhas, a determinação judicial para aumentar o número de veículos em circulação, redução de passageiros transportados por veículo e principalmente pela falta de manifestação da autoridade municipal sobre sua correspondente contrapartida, muito embora a decisão estabeleça responsabilidade solidária entre município e empresa.

Desse modo, em respeito e responsabilidade que temos com cada colaborador, e também ao compromisso que temos com a sociedade de Presidente Prudente, atendo-se a legislação vigente, respeitando a legislação trabalhista, a empresa foi obrigada a se reestruturar nesse momento de crise gerado pelo coronavírus e pelo impacto operacional mencionado, para conseguir permanecer minimamente em funcionamento. Assim, foi necessário promover a consequente redução, para viabilizar a preservação, manutenção e continuidade de mais de 200 empregos gerados ao município. 

Certo da compreensão de todos pelo momento coletivo de dificuldade vivenciado, agradecemos e reafirmamos nosso compromisso com o município de Presidente Prudente.

Presidente Prudente/SP, 21 de maio de 2020.

COMPANY – TUR TRANSPORTES E TURISMO LTDA','img/noticias/not_4.png','2020-05-21','18:51:00');

insert into noticia(not_id,not_titulo,not_texto,`not_image-link`,not_data,not_hora) VALUES (3,'Nota de Esclarecimento','A Prudente Urbano vem a público esclarecer que desde o início da pandemia de COVID-19 sofre reflexos drásticos em sua operação diária e luta para manter seus compromissos com nossos usuários e colaboradores. No entanto, a perda superior a 80% de nossos passageiros é algo imprevisível e que reflete imediatamente em nossos compromissos financeiros diariamente.

Compreendemos os transtornos que a operação emergencial representa na vida de cada passageiro e lamentamos por isso. Nossos passageiros são nossa prioridade essencial, e somente por essa razão nossos serviços estão sendo mantidos.

Esta é uma circunstância nunca vivida por nós e o transporte em Presidente Prudente, diferentemente de muitas cidades não parou por nenhum dia. Estamos oferecendo transporte ao longo dessas semanas a um custo muito elevado e nossa arrecadação não é suficiente para mantermos, sozinhos, o transporte como gostaríamos. Lamentamos o transtorno mas viemos a público explicar que estamos trabalhando arduamente para manter o serviço essencial em nossa cidade. Embora tardiamente, as informações são divulgadas assim que possível, mas entendemos e temos ouvido cada uma das queixas que nos são apresentadas.

Nossa atuação é limitada mas nosso maior objetivo é manter e honrar uma operação emergencial que possa mesmo que de forma insuficiente, atender as principais demandas.

Agradecemos a colaboração de cada usuário e instituição que nos procura e sinaliza suas necessidades, e esclarecemos que todos são ouvidos com empatia e que a coletividade é priorizada no transporte público.

Esperamos a compreensão de todos.
','img/noticias/not_3.jpg','2020-03-27','09:26:00');

insert into noticia(not_id,not_titulo,not_texto,`not_image-link`,not_data,not_hora) VALUES (2,'Alteração temporária de itinerário','A partir de amanhã (17/03), alguns dos nossos ônibus especiais deixarão de circular temporariamente. Fique ligado e não esqueça.


Período da manhã:

Linha 102 São Lucas x Hospital Regional – 6h15 saindo do São Lucas

Linha 111 Ana Jacinta x Vila Furquim – 5h55 saindo do Ana Jacinta

Linha 112 Ana Jacinta x João Domingos – 6h05 saindo do João Domingos

Linha 128 Brasil Novo x Distrito Industrial e Colégio Agrícola- 6h20 saindo do Brasil Novo

Linha 129 Brasil Novo x COHAB – 6h30 saindo do 3° Milênio','img/noticias/not_2.png','2020-03-16','18:51:00');

insert into noticia(not_id,not_titulo,not_texto,`not_image-link`,not_data,not_hora) VALUES (1,'Para você que perdeu o prazo de recadastramento ou cadastramento','
Se você que perdeu o prazo de recadastramento ou cadastramento e precisa efetuar o cadastro ou recadastro do Passe Social, vá primeiramente à SEDUC para conferir os documentos exigidos. O endereço é na Rua Cyro Bueno, 96, Jardim Morumbi. Após a verificação com aprovação, basta ir para o PPU finalizar o processo.','img/noticias/not_1.png','2020-02-05','10:24:00');