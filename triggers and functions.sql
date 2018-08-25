drop function if exists validaCPF;
-- função cpf
DELIMITER $$
CREATE  FUNCTION `validaCPF` (`CPF` VARCHAR(11))  
RETURNS  TINYINT(4) 
BEGIN 
DECLARE INDICE, SOMA, DIG1, DIG2 INT; 
SET INDICE = 1;  
SET SOMA = 0;  
 
WHILE (INDICE <= 9 )  
DO
SET SOMA = SOMA + CAST(SUBSTRING(CPF,  INDICE,  1)  AS  UNSIGNED) * (11 - INDICE);  
SET INDICE = INDICE + 1; 
END WHILE;  
SET DIG1 = 11 - (SOMA % 11);
 
IF DIG1 > 9 THEN 
SET DIG1 = 0; 
END IF;
 
SET INDICE = 1; 
SET SOMA = 0; 
WHILE (INDICE <= 10)  
DO  
SET SOMA = SOMA + CAST(SUBSTRING(CPF, INDICE, 1) AS UNSIGNED) * (12 - INDICE);  
SET INDICE = INDICE + 1; 
END WHILE; 
SET DIG2 = 11 - (SOMA % 11);  

IF DIG2 > 9 THEN  
SET DIG2 = 0; 
END IF; 

IF ((DIG1 = SUBSTRING(CPF, LENGTH(CPF)-1, 1))AND (DIG2 = SUBSTRING(CPF, LENGTH(CPF), 1) OR (CPF = ''))
AND NOT((CPF = "11111111111") OR (CPF = "22222222222")  
OR (CPF = "33333333333") OR (CPF = "44444444444") OR (CPF = "55555555555")  
OR (CPF = "66666666666") OR (CPF = "77777777777") OR (CPF = "88888888888") 
OR (CPF = "99999999999") OR (CPF = "00000000000"))) THEN  
RETURN TRUE;  
ELSE RETURN FALSE;  
END IF;  
END$$ 
DELIMITER ; 

DROP TRIGGER IF EXISTS `gesc`.`tr_valida_cpf`;

DELIMITER $$
USE `gesc`$$
CREATE DEFINER=`root`@`localhost` TRIGGER `tr_valida_cpf` BEFORE update ON `pessoa`
FOR EACH ROW 
BEGIN
IF(NEW.cpf = '')THEN BEGIN
END;
ELSEIF (((SELECT count(*) from pessoa where pessoa.cpf = '11') > 0)) THEN BEGIN
SIGNAL SQLSTATE '45000'  
SET MESSAGE_TEXT = 'Erro: CPF ja cadastrado';
END;  
ELSEIF ((SELECT validaCPF(NEW.cpf)) = false) THEN BEGIN  
SIGNAL SQLSTATE '45000'  
SET MESSAGE_TEXT = 'Erro: CPF inválido';  
END;
END IF; 
END$$
DELIMITER ;


drop trigger if exists tr_valida_cpfupd;
-- gatilho cpf
DELIMITER $$  
CREATE TRIGGER `tr_valida_cpfupd` BEFORE update ON `pessoa`
FOR EACH ROW 
BEGIN
IF(NEW.cpf = '')THEN BEGIN
END;  
ELSEIF ((SELECT validaCPF(NEW.cpf)) = false) THEN BEGIN  
SIGNAL SQLSTATE '45000'  
SET MESSAGE_TEXT = 'Erro: CPF nao inválido';  
END;
END IF; 
END $$
DELIMITER ;


drop function if exists fn_validacep;
-- função cep
DELIMITER $$
CREATE FUNCTION fn_validacep (cep varchar(8))
RETURNS TINYINT(4)
BEGIN
    if(length(cep) = 8 )then
RETURN true;
else return false;
end if;
END$$
DELIMITER ;

drop trigger if exists tr_cep;
-- gatilho cep
DELIMITER $$
create trigger tr_cep before insert on pessoa for each row
begin
if ((select fn_validacep(NEW.cep)) = false) then
begin 
signal sqlstate'45000'
set message_text = 'cep invalido';
end;
end if;
end $$ 
delimiter ;

drop trigger if exists tr_cepupd
DELIMITER $$
create trigger tr_cepupd before update on pessoa for each row
begin
if ((select fn_validacep(NEW.cep)) = false) then
begin 
signal sqlstate'45000'
set message_text = 'cep invalido';
end;
end if;
end $$ 
delimiter ;


-- FUNÇÃO EMAIL
drop function if exists `fn_validaemail`;
DELIMITER $$
CREATE FUNCTION fn_validaemail (email varchar(255))
RETURNS TINYINT(4)
BEGIN
    if(email rlike '@')then
RETURN true;
else return false;
end if;
END$$
DELIMITER ;


drop trigger if exists tr_email;
-- GATILHO EMAIL
DELIMITER $$
create trigger tr_email before insert on usuario for each row
begin
if ((select fn_validaemail(NEW.email)) = false) then
begin 
signal sqlstate'45000'
set message_text = 'Email invalido';
end;
end if;
end $$ 
delimiter ;

drop trigger if exists tr_emailupdate;
-- GATILHO EMAIL
DELIMITER $$
create trigger tr_emailupdate before update on usuario for each row
begin
if ((select fn_validaemail(NEW.email)) = false) then
begin 
signal sqlstate'45000'
set message_text = 'Email invalido';
end;
end if;
end $$ 
delimiter ;


drop trigger if exists validar_datanasc;
DELIMITER $
CREATE TRIGGER validar_datanasc BEFORE INSERT ON pessoa
FOR EACH ROW
BEGIN
    IF (((TIMESTAMPDIFF(YEAR, new.datanascimento, now())) <0) 
    OR ((TIMESTAMPDIFF(YEAR, NEW.datanascimento, now())) <= 4))
    THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Idade invalida';
    END IF;
END$
DELIMITER ;

drop trigger if exists validar_datanascupd;
DELIMITER $
CREATE TRIGGER validar_datanascupd BEFORE UPDATE ON pessoa
FOR EACH ROW
BEGIN
    IF (((TIMESTAMPDIFF(YEAR, new.datanascimento, now())) <0) 
    OR ((TIMESTAMPDIFF(YEAR, NEW.datanascimento, now())) <= 4))
    THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Idade invalida';
    END IF;
END$
DELIMITER ;



