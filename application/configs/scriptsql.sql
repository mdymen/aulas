CREATE TABLE `bobby`.`cursos` (
  `ID_ID_CR` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `ST_IDENT_CR` VARCHAR(45) NOT NULL,
  `ST_NOME_CR` VARCHAR(45) NOT NULL,
  `ST_DESCR_CR` TEXT,
  `VL_CUSTO_CR` DOUBLE NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_ID_CR`)
)
ENGINE = InnoDB;

CREATE TABLE `bobby`.`usuarios` (
  `ID_ID_USU` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_USUARIO_USU` VARCHAR(45) NOT NULL,
  `ST_SENHA_USU` VARCHAR(45) NOT NULL,
  `ST_LOGIN_USU` VARCHAR(45) NOT NULL,
  `FL_ADMIN_USU` BOOLEAN NOT NULL,
  PRIMARY KEY (`ID_ID_USU`)
)
ENGINE = InnoDB;

CREATE TABLE `bobby`.`slides` (
  `ID_SLIDE_SLI` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_CURSO_CR` INTEGER UNSIGNED NOT NULL,
  `NM_ANTERIOR_SLI` INTEGER UNSIGNED NOT NULL,
  `ST_SLIDE_SLI` TEXT NOT NULL,
  PRIMARY KEY (`ID_SLIDE_SLI`)
)
ENGINE = InnoDB;

ALTER TABLE `bobby`.`slides` ADD COLUMN `ST_DESCR_SLI` VARCHAR(100) AFTER `ST_SLIDE_SLI`;
ALTER TABLE `bobby`.`slides` CHANGE COLUMN `NM_ANTERIOR_SLI` `NM_SLIDE_SLI` INT(10) UNSIGNED NOT NULL;

ALTER TABLE `bobby`.`slides` ADD CONSTRAINT `FK_slides_cursos` FOREIGN KEY `FK_slides_cursos` (`ID_CURSO_CR`)
    REFERENCES `cursos` (`ID_ID_CR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

ALTER TABLE `bobby`.`cursos`
/* Os temas que o curso trata  */
 ADD COLUMN `ST_CONTEUDO_CR` TEXT AFTER `VL_CUSTO_CR`,
 ADD COLUMN `ST_OBJETIVO_CR` TEXT AFTER `ST_CONTEUDO_CR`,
/* Este campo � por exemplo se o curso tem audio, exercisios, exemplos, so leitura, etc.*/
 ADD COLUMN `ST_CARACT_CR` TEXT AFTER `ST_OBJETIVO_CR`;

CREATE TABLE `bobby`.`usuario_curso` (
  `ID_USU_UC` INTEGER UNSIGNED NOT NULL,
  `ID_CUR_UC` INTEGER UNSIGNED NOT NULL,
  CONSTRAINT `FK_usuario_curso_1` FOREIGN KEY `FK_usuario_curso_1` (`ID_CUR_UC`)
    REFERENCES `cursos` (`ID_ID_CR`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `FK_usuario_curso_2` FOREIGN KEY `FK_usuario_curso_2` (`ID_USU_UC`)
    REFERENCES `usuarios` (`ID_ID_USU`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
)
ENGINE = InnoDB;

ALTER TABLE `bobby`.`cursos` ADD COLUMN `ST_IMAGEM_CR` VARCHAR(45) AFTER `ST_CARACT_CR`,
 ADD UNIQUE INDEX `IMAGEM`(`ST_IMAGEM_CR`);

ALTER TABLE `bobby`.`slides` ADD COLUMN `ST_TITULO_SLI` VARCHAR(255) NOT NULL AFTER `ST_DESCR_SLI`;

CREATE TABLE `bobby`.`anotacoes` (
  `ID_ANOTACAO_ANO` INT NOT NULL,
  `ID_CURSO_CR` INT NOT NULL,
  `ID_USUARIO_USU` INT NULL,
  `ST_TEXTO_USU` TEXT NULL,
  PRIMARY KEY (`ID_ANOTACAO_ANO`));

ALTER TABLE `bobby`.`anotacoes` 
CHANGE COLUMN `ST_TEXTO_USU` `ST_TEXTO_ANO` TEXT NULL DEFAULT NULL ,
ADD COLUMN `DT_DATA_ANO` DATE NULL AFTER `ST_TEXTO_ANO`;

ALTER TABLE `bobby`.`anotacoes` 
CHANGE COLUMN `DT_DATA_ANO` `DT_DATETIME_ANO` DATETIME NULL DEFAULT NULL ;

ALTER TABLE `bobby`.`anotacoes` 
CHANGE COLUMN `ID_ANOTACAO_ANO` `ID_ANOTACAO_ANO` INT(11) NOT NULL AUTO_INCREMENT ;

CREATE TABLE `bobby`.`perguntas_cursos` (
  `ID_PERGUNTA_PER` INT NOT NULL,
  `ID_CURSO_CR` INT NULL,
  `ID_USUARIO_USU` INT NULL,
  `ST_PERGUNTA_PER` TEXT NULL,
  `ST_RESPOSTA_PER` TEXT NULL,
  PRIMARY KEY (`ID_PERGUNTA_PER`));

ALTER TABLE `bobby`.`perguntas_cursos` 
ADD COLUMN `DT_UTIMOMOV_PER` DATETIME NULL AFTER `ST_RESPOSTA_PER`;

ALTER TABLE `bobby`.`perguntas_cursos` 
CHANGE COLUMN `ID_PERGUNTA_PER` `ID_PERGUNTA_PER` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `bobby`.`usuarios` 
DROP COLUMN `ST_LOGIN_USU`;

ALTER TABLE `bobby`.`usuarios` 
CHANGE COLUMN `ID_USUARIO_USU` `ST_USUARIO_USU` VARCHAR(45) NOT NULL ;

ALTER TABLE `bobby`.`usuarios` 
ADD COLUMN `ST_EMAIL_USU` VARCHAR(45) NULL AFTER `FL_ADMIN_USU`;

ALTER TABLE `bobby`.`usuarios` 
CHANGE COLUMN `FL_ADMIN_USU` `FL_ADMIN_USU` TINYINT(1) NULL ;

ALTER TABLE `bobby`.`usuarios` 
ADD COLUMN `NM_CREDITO_USU` DECIMAL(2) NULL DEFAULT 0 AFTER `ST_EMAIL_USU`;