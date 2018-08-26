drop view if exists identificacao;
create view identificacao as
select 
	pre1.nomepessoa nomeresponsavel1, 
    pre1.datanascimento nascimentoresponsavel1,
    pre1.cpf cpfresponsavel1, pre1.rg rgresponsavel1, 
    pre1.emissorrg emissorresponsavel1, pre1.sexo sexoresponsavel1,
    
    resp1.estadocivil, resp1.escolaridade, 
	resp1.profissao, resp1.telefone tel1resp2, resp1.telefone2 tel2resp2,
	resp1.localtrabalho, resp1.idfamilia,
    
	pre2.nomepessoa nomeresponsavel2, 
    pre2.datanascimento nascimentoresponsavel2,
    pre2.cpf cpfresponsavel2, pre2.rg rgresponsavel2, 
    pre2.emissorrg emissorresponsavel2, pre2.sexo sexoresponsavel2,
    
    resp2.estadocivil, resp2.escolaridade, 
	resp2.profissao, resp2.telefone, resp2.telefone2,
	resp2.localtrabalho, resp2.idfamilia,
    
        
	familia.arearisco, familia.beneficiopc, familia.bolsafamilia,
	familia.moradia, familia.numnis, familia.tipohabitacao,
	
    cras.nomecras, crianca.idcrianca, crianca.idpublicoprioritario, 
    crianca.obssaude, crianca.datacadastro, 
    
    cr.nomepessoa nomecrianca, cr.datanascimento nascimentocrianca, 
	cr.logradouro, cr.bairro, cr.ncasa, cr.complementoendereco,
	cr.cpf cpfcrianca, cr.rg rgcrianca, cr.sexo sexocrianca, cr.emissorrg emissorcrianca, matriculas.idmatricula,
	escola.nomeescola, turma.grupoconvivencia, turma.turno
from
	responsavel resp1, responsavel resp2, pessoa cr, pessoa pre1, pessoa pre2, 
    escola, familia, cras, crianca, matriculas, turma, parentesco
where 
	resp1.idpessoa = pre1.idpessoa
and resp2.idpessoa = pre2.idpessoa
    
and resp1.idfamilia = familia.idfamilia
and crianca.idpessoa = cr.idpessoa
and matriculas.idturma = turma.idturma
and parentesco.idcrianca = crianca.idcrianca
and parentesco.idresponsavel = resp1.idresponsavel;




select * from parentes, identificacao;    