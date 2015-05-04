CREATE TABLE `cursos` (
  `ID_ID_CR` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `ST_IDENT_CR` VARCHAR(45) NOT NULL,
  `ST_NOME_CR` VARCHAR(45) NOT NULL,
  `ST_DESCR_CR` TEXT,
  `VL_CUSTO_CR` DOUBLE NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_ID_CR`)
)
ENGINE = InnoDB;

CREATE TABLE `usuarios` (
  `ID_ID_USU` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_USUARIO_USU` VARCHAR(45) NOT NULL,
  `ST_SENHA_USU` VARCHAR(45) NOT NULL,
  `ST_LOGIN_USU` VARCHAR(45) NOT NULL,
  `FL_ADMIN_USU` BOOLEAN NOT NULL,
  PRIMARY KEY (`ID_ID_USU`)
)
ENGINE = InnoDB;

CREATE TABLE `slides` (
  `ID_SLIDE_SLI` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_CURSO_CR` INTEGER UNSIGNED NOT NULL,
  `NM_ANTERIOR_SLI` INTEGER UNSIGNED NOT NULL,
  `ST_SLIDE_SLI` TEXT NOT NULL,
  PRIMARY KEY (`ID_SLIDE_SLI`)
)
ENGINE = InnoDB;

ALTER TABLE `slides` ADD COLUMN `ST_DESCR_SLI` VARCHAR(100) AFTER `ST_SLIDE_SLI`;
ALTER TABLE `slides` CHANGE COLUMN `NM_ANTERIOR_SLI` `NM_SLIDE_SLI` INT(10) UNSIGNED NOT NULL;

ALTER TABLE `slides` ADD CONSTRAINT `FK_slides_cursos` FOREIGN KEY `FK_slides_cursos` (`ID_CURSO_CR`)
    REFERENCES `cursos` (`ID_ID_CR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

ALTER TABLE `cursos`
/* Os temas que o curso trata  */
 ADD COLUMN `ST_CONTEUDO_CR` TEXT AFTER `VL_CUSTO_CR`,
 ADD COLUMN `ST_OBJETIVO_CR` TEXT AFTER `ST_CONTEUDO_CR`,
/* Este campo � por exemplo se o curso tem audio, exercisios, exemplos, so leitura, etc.*/
 ADD COLUMN `ST_CARACT_CR` TEXT AFTER `ST_OBJETIVO_CR`;

CREATE TABLE `usuario_curso` (
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

ALTER TABLE `cursos` ADD COLUMN `ST_IMAGEM_CR` VARCHAR(45) AFTER `ST_CARACT_CR`,
 ADD UNIQUE INDEX `IMAGEM`(`ST_IMAGEM_CR`);

ALTER TABLE `slides` ADD COLUMN `ST_TITULO_SLI` VARCHAR(255) NOT NULL AFTER `ST_DESCR_SLI`;

CREATE TABLE `anotacoes` (
  `ID_ANOTACAO_ANO` INT NOT NULL,
  `ID_CURSO_CR` INT NOT NULL,
  `ID_USUARIO_USU` INT NULL,
  `ST_TEXTO_USU` TEXT NULL,
  PRIMARY KEY (`ID_ANOTACAO_ANO`));

ALTER TABLE `anotacoes` 
CHANGE COLUMN `ST_TEXTO_USU` `ST_TEXTO_ANO` TEXT NULL DEFAULT NULL ,
ADD COLUMN `DT_DATA_ANO` DATE NULL AFTER `ST_TEXTO_ANO`;

ALTER TABLE `anotacoes` 
CHANGE COLUMN `DT_DATA_ANO` `DT_DATETIME_ANO` DATETIME NULL DEFAULT NULL ;

ALTER TABLE `anotacoes` 
CHANGE COLUMN `ID_ANOTACAO_ANO` `ID_ANOTACAO_ANO` INT(11) NOT NULL AUTO_INCREMENT ;

CREATE TABLE `perguntas_cursos` (
  `ID_PERGUNTA_PER` INT NOT NULL,
  `ID_CURSO_CR` INT NULL,
  `ID_USUARIO_USU` INT NULL,
  `ST_PERGUNTA_PER` TEXT NULL,
  `ST_RESPOSTA_PER` TEXT NULL,
  PRIMARY KEY (`ID_PERGUNTA_PER`));

ALTER TABLE `perguntas_cursos` 
ADD COLUMN `DT_UTIMOMOV_PER` DATETIME NULL AFTER `ST_RESPOSTA_PER`;

ALTER TABLE `perguntas_cursos` 
CHANGE COLUMN `ID_PERGUNTA_PER` `ID_PERGUNTA_PER` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `usuarios` 
DROP COLUMN `ST_LOGIN_USU`;

ALTER TABLE `usuarios` 
CHANGE COLUMN `ID_USUARIO_USU` `ST_USUARIO_USU` VARCHAR(45) NOT NULL ;

ALTER TABLE `usuarios` 
ADD COLUMN `ST_EMAIL_USU` VARCHAR(45) NULL AFTER `FL_ADMIN_USU`;

ALTER TABLE `usuarios` 
CHANGE COLUMN `FL_ADMIN_USU` `FL_ADMIN_USU` TINYINT(1) NULL ;

ALTER TABLE `usuarios` 
ADD COLUMN `NM_CREDITO_USU` DECIMAL(2) NULL DEFAULT 0 AFTER `ST_EMAIL_USU`;

ALTER TABLE `usuario_curso` 
ADD COLUMN `NM_UTIMAVIU_UC` INT(3) NOT NULL DEFAULT 0 AFTER `ID_CUR_UC`;

ALTER TABLE `slides` 
ADD COLUMN `ST_RESULTADOS_SLI` TEXT NULL AFTER `ST_TITULO_SLI`;

CREATE TABLE `usuarios_slides_cursos` (
  `ID_ID_USC` INT NOT NULL AUTO_INCREMENT,
  `ID_USUARIO_USC` INT NOT NULL,
  `ID_SLIDE_USC` INT NOT NULL,
  `ID_CURSO_USC` INT NOT NULL,
  `ST_RESPOSTAS_USC` TEXT NOT NULL,
  PRIMARY KEY (`ID_ID_USC`));

ALTER TABLE `slides` 
CHANGE COLUMN `ST_RESULTADOS_SLI` `ST_RESPOSTAS_SLI` TEXT NULL ;

ALTER TABLE `perguntas_cursos` 
ADD COLUMN `FL_EXCLUIDA_PER` INT NULL DEFAULT 0 AFTER `DT_UTIMOMOV_PER`;

ALTER TABLE `perguntas_cursos` 
CHANGE COLUMN `FL_EXCLUIDA_PER` `FL_EXCLUIDA_PER` INT(1) NULL DEFAULT 0 ,
ADD COLUMN `FL_LIDA_PER` INT(1) NULL DEFAULT 0 AFTER `FL_EXCLUIDA_PER`;

ALTER TABLE `usuarios` 
ADD COLUMN `ST_CONFIRMADO_USU` VARCHAR(255) NULL AFTER `NM_CREDITO_USU`;

ALTER TABLE `cursos` 
ADD COLUMN `ST_MINIDESCR_CR` VARCHAR(255) NULL AFTER `ST_IMAGEM_CR`;

ALTER TABLE `cursos` 
ADD COLUMN `ST_SUBTITULO_CR` VARCHAR(255) NULL AFTER `ST_MINIDESCR_CR`;

ALTER TABLE `usuario_curso` 
ADD COLUMN `NM_ACERTOS_UC` INT NULL AFTER `NM_UTIMAVIU_UC`,
ADD COLUMN `NM_TOTALEXERC_UC` INT NULL AFTER `NM_ACERTOS_UC`;

ALTER TABLE `usuario_curso` 
CHANGE COLUMN `NM_ACERTOS_UC` `NM_ACERTOS_UC` INT(11) NULL DEFAULT 0 ,
CHANGE COLUMN `NM_TOTALEXERC_UC` `NM_TOTALEXERC_UC` INT(11) NULL DEFAULT 0 ;


-- Andre junqueira
-- Script criacao da tabela credito e credito_pendente e a trigger necessaria



CREATE TABLE IF NOT EXISTS `creditos` (
`ID_CREDITO` int(11) NOT NULL,
  `ID_USUARIO` int(10) NOT NULL,
  `VL_VALOR_CREDITO` decimal(10,2) NOT NULL,
  `DT_DATA_CREDITO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

ALTER TABLE `creditos`
 ADD PRIMARY KEY (`ID_CREDITO`);

ALTER TABLE `creditos`
MODIFY `ID_CREDITO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;


CREATE TABLE IF NOT EXISTS `credito_pendentes` (
`ID_CREDITO_PEN` int(11) NOT NULL,
  `ID_USUARIO` int(10) NOT NULL,
  `VL_VALOR_CREDITO_PEN` decimal(10,2) NOT NULL,
  `DT_DATA_CREDITO_PEN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FL_PENDENTE` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


DELIMITER //
CREATE TRIGGER `trg_creditar_usuario` AFTER UPDATE ON `credito_pendentes`
 FOR EACH ROW begin
  declare
  existe INT;
  
   select count(*) into existe from creditos where id_usuario = NEW.id_usuario ;
  
  if existe > 0 THEN 
			update creditos 
			set vl_valor_credito = vl_valor_credito + NEW.vl_valor_credito_pen,
			    dt_data_credito = NOW()
			where id_usuario = NEW.id_usuario;
		ELSE
			insert into creditos (id_usuario,vl_valor_credito) 
						  values (NEW.id_usuario,NEW.vl_valor_credito_pen);    
    END IF;                              
                    
  end
//
DELIMITER ;


ALTER TABLE `credito_pendentes`
 ADD PRIMARY KEY (`ID_CREDITO_PEN`);

ALTER TABLE `credito_pendentes`
MODIFY `ID_CREDITO_PEN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;

