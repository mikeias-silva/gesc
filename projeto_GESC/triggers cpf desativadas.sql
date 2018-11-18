CREATE DEFINER=`root`@`localhost` TRIGGER `tr_valida_cpf` BEFORE insert ON `pessoa`
FOR EACH ROW 
BEGIN
IF(NEW.cpf = null)THEN BEGIN
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
END




CREATE DEFINER=`root`@`localhost` TRIGGER `tr_valida_cpfupd` BEFORE update ON `pessoa`
FOR EACH ROW 
BEGIN
IF(NEW.cpf = null)THEN 
BEGIN
  
	IF ((SELECT validaCPF(NEW.cpf)) = false) THEN BEGIN  
	SIGNAL SQLSTATE '45000'  
	SET MESSAGE_TEXT = 'Erro: CPF inválido';  
	END;
	END IF; 
END;
END IF;
END