drop view if exists parentes;
create view parentes as         
select 
	re.nomepessoa nomeresponsavel, re.datanascimento nascimentoresponsavel,
    re.cpf cpfresponsavel, re.rg rgresponsavel, 
    re.emissorrg emissorresponsavel, re.sexo sexoresponsavel,
    
    parentesco.idresponsavel, parentesco.idcrianca,
    
    responsavel.idfamilia, responsavel.estadocivil,
    responsavel.localtrabalho, responsavel.profissao,
    responsavel.escolaridade, responsavel.telefone,
    responsavel.telefone2, responsavel.outrasobs
from 
	parentesco, pessoa re, responsavel, familia, cras, crianca
where
	responsavel.idpessoa = re.idpessoa
and parentesco.idcrianca = crianca.idcrianca
and parentesco.idresponsavel = responsavel.idresponsavel
and responsavel.idfamilia = familia.idfamilia
and cras.idcras = familia.idcras;

drop view if exists dadosfamilia;
create view dadosfamilia as
select
	familia.idfamilia, familia.arearisco, 
    familia.bolsafamilia, familia.moradia,
    familia.numnis, familia.tipohabitacao,
    familia.beneficiopc,
    cras.nomecras, cras.idcras
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
	pessoa.logradouro, pessoa.bairro, pessoa.ncasa, pessoa.complementoendereco, pessoa.cep,
	pessoa.cpf cpfcrianca, pessoa.rg rgcrianca, pessoa.sexo sexocrianca, 
    pessoa.emissorrg emissorcrianca, matriculas.idmatricula,
	crianca.obssaude,
	escola.nomeescola,
    publicoprioritario.publicoprioritario, publicoprioritario.idpublicoprioritario
from 
	 crianca, matriculas, pessoa, escola, publicoprioritario
where 
	crianca.idcrianca = matriculas.idcrianca 
	and crianca.idpessoa = pessoa.idpessoa
    and crianca.idescola = escola.idescola
    and crianca.idpublicoprioritario = publicoprioritario.idpublicoprioritario;
    
drop view if exists vagasdasmatriculas;
create view  vagasdasmatriculas as
select 
		matriculas.idmatricula, vagas.idvaga, matriculas.anomatricula, matriculas.idcrianca,
        matriculas.statuscadastro, vagas.anovaga, vagas.numvaga, vagas.idademax, vagas.idademin
from 
	matriculas, vagas, crianca
where 
	matriculas.idvaga = vagas.idvaga
    and matriculas.idcrianca = crianca.idcrianca;
    
    
    
select * from rematriculas where anovaga = '2019'