drop view if exists parentes;
create view parentes as         
select 
	re.nomepessoa nomeresponsavel, re.datanascimento nascimentoresponsavel,
    re.cpf cpfresponsavel, re.rg rgresponsavel, 
    re.emissorrg emissorresponsavel, re.sexo sexoresponsavel,
    parentesco.idresponsavel, parentesco.idcrianca
from 
	parentesco, pessoa re, responsavel, familia, cras, crianca
where
	responsavel.idpessoa = re.idpessoa
and parentesco.idcrianca = crianca.idcrianca
and parentesco.idresponsavel = responsavel.idresponsavel
and responsavel.idfamilia = familia.idfamilia
and cras.idcras = familia.idcras;


create view dadosfamilia as
select
	familia.idfamilia, familia.arearisco, 
    familia.bolsafamilia, familia.moradia,
    familia.numnis, familia.tipohabitacao,
    cras.nomecras
from 
	familia, cras
where 
	cras.idcras = familia.idcras;
    
    
drop view if exists dadosmatricula;
create view dadosmatricula as
select 
	matriculas.idmatricula, matriculas.anomatricula datamatricula, matriculas.serieescolar,
    turma.grupoconvivencia,
    matriculas.idcrianca
from 
	matriculas, crianca, turma
where 
	matriculas.idcrianca = crianca.idcrianca
and matriculas.idturma = turma.idturma;


drop view if exists dadoscrianca;
create view dadoscrianca as 
select 
	crianca.idcrianca, pessoa.nomepessoa nomecrianca, pessoa.datanascimento nascimentocrianca, 
	pessoa.logradouro, pessoa.bairro, pessoa.ncasa, pessoa.complementoendereco,
	pessoa.cpf cpfcrianca, pessoa.rg crianca, pessoa.sexo sexocrianca, 
    pessoa.emissorrg emissorcrianca, matriculas.idmatricula,
	escola.nomeescola
from 
	matriculas, crianca, pessoa, escola
where 
	crianca.idcrianca=matriculas.idcrianca 
	and crianca.idpessoa=pessoa.idpessoa;