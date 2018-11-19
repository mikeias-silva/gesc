var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

// $('.table-add').click(function() {
//     var $clone = $TABLE.find('tr.hide').clone(true).attr("id", "idpraremover");
//     //$TABLE.find('linha').val($linha + 1);
//     // console.log($("linha"));
//     $TABLE.find('table').append($clone);
// });

$('.table-remove').click(function() {
    var nomevazio = $("#nomemembro").text();

    //var limpar = $TABLE.find('tr.hide');
    // console.log(nomevazio);
    /* if(!nomevazio  ){
         console.log('opa nao pode');
     }*/

    //$TABLE.find('table extra').remove();
    var queroremover = "1";
    console.log(queroremover);
    queroremover = $("#idpraremover").prop('id');
    console.log(queroremover);
    if ($(this).parents('#idpraremover') != undefined) {
        console.log('entrou aqui');

    }
    $(this).parents('#idpraremover').detach();
    //
});

$('.table-up').click(function() {
    var $row = $(this).parents('tr');
    if ($row.index() === 1) return; // Don't go above the header
    $row.prev().before($row.get(0));
});

$('.table-down').click(function() {
    var $row = $(this).parents('tr');
    $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function() {
    var $rows = $TABLE.find('tr:not(:hidden)');
    var headers = [];
    var data = [];

    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function() {
        headers.push($(this).text().toLowerCase());
    });

    // Turn all existing rows into a loopable array
    $rows.each(function() {
        var $td = $(this).find('td');
        var h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach(function(header, i) {
            h[header] = $td.eq(i).text();
        });

        data.push(h);
    });

    // Output the result
    $EXPORT.text(JSON.stringify(data));
});


$('.table-add').click(function(){
    //var comboEscolas = document.getElementsByName("escolamembro[0]");
    //var comboEscolas = document.getElementById('escolaoriginal');
    //console.log(comboEscolas.value);
    //console.log(comboEscolas.options.length);  
    //for (i = 0; i < comboEscolas.length; i++) {
        //console.log(comboEscolas.options[i]);
    //}
    var newRow = $("<tr><td class='pt-3-half'><input id='tdedit' type='text' value='' name='nomemembro[]' autocomplete='off'/></td><td class='pt-3-half'><input id='tdedit' type='date' value='' name='nascimentomembro[]' autocomplete='off'/></td><td class='pt-3-half'><input id='tdedit' type='text' name='trabmembro[]' autocomplete='off'/></td><td><select id='tdedit' name='escolamembro[]' class='custom-select' ><option value='1'>Sem escola</option><option value='2'>Escola Municipal Rubens</option><option value='3'>Escola Estadual Drº Epaminondas</option><option value='4'>Escola Estadual Pres. Kennedy</option><option value='5'>Escola Municipal São Jorge</option><option value='6'>Colégio Estadual 31 de Março</option><option value='7'>Colégio Estadual Alberto Rebello Valente</option><option value='8'>Colégio Estadual Professor Amálio Pinheiro</option><option value='9'>Colégio Estadual Ana Divanir Borato</option><option value='10'>Colégio Estadual General Antônio Sampaio</option><option value='11'>Colégio Estadual Padre Arnaldo Jansen</option><option value='12'>Colégio Agrícola Estadual Augusto Ribas</option><option value='13'>Colégio Estadual Professor Becker E Silva</option><option value='14'>Colégio Estadual Maestro Bento Mussurunga</option><option value='15'>Escola Estadual do Campo Brasílio Antunes da Silva</option><option value='16'>Colégio Estadual Padre Carlos Zelesny</option><option value='17'>Centro Estadual de Educação Básica de Jovens e Adultos Professor Odair Pasqualini</option><option value='18'>Centro Estadual de Educação Básica de Jovens e Adultos Professor Paschoal Salles Rosa</option><option value='19'>Centro Estadual de Educação Básica de Jovens e Adultos da Universidade Estadual de Ponta Grossa</option><option value='20'>Centro Estadual de Educação Profissional de Ponta Grossa</option><option value='21'>Colégio Estadual Professor Colares</option><option value='22'>Colégio Estadual Colônia Dona Luiza</option><option value='23'>Colégio Estadual Senador Correia</option><option value='24'>Escola Estadual do Campo de Vila Velha</option><option value='25'>Colégio Estadual Dorah Gomes Daitschman</option><option value='26'>Colégio Estadual Frei Doroteu de Pádua</option><option value='27'>Colégio Estadual Professor Edison Pietrobelli</option><option value='28'>Colégio Estadual Professora Elzira Correia de Sá</option><option value='29'>Colégio Estadual Doutor Epaminondas Novaes Ribas</option><option value='30'>Escola Modalidade Educação Especial Esperança</option><option value='31'>Colégio Estadual Espírito Santo</option><option value='32'>Colégio Estadual Professor Eugênio Malanski</option><option value='33'>Colégio Estadual Francisco Pires Machado</option><option value='34'>Centro Pontagrossense de Reabilitação Auditiva e da Fala Geny de Jesus S Ribas</option><option value='35'>Colégio Estadual Professora Hália Terezinha Gruba</option><option value='36'>Instituto de Educação Professor Cesár Prieto Martinez</option><option value='37'>Instituição Educação Especial Nova Visão</option><option value='38'>Instituição Especial Professora Raquel S M</option><option value='39'>Escola Estadual Professor Iolando Taques Fonseca</option><option value='40'>Escola Estadual Jesus Divino Operário</option><option value='41'>Colégio Estadual Professor João Ricardo Von Borell du Vernay</option><option value='42'>Colégio Estadual José Elias da Rocha</option><option value='43'>Colégio Estadual Professor José Gomes do Amaral</option><option value='44'>Colégio Estadual Professor Júlio Teodorico</option><option value='45'>Colégio Estadual Presidente Kennedy</option><option value='46'>Colégio Estadual Professora Linda Salamuni Bacila</option><option value='47'>Colégio Estadual Professora Margarete Márcia Mazur</option><option value='48'>Escola Modalidade Educação Especial Professora Maria de Lourdes Canziani</option><option value='49'>Escola Modalidade Educação Especial Maria Dolores</option><option value='50'>Escola Estadual Medalha Milagrosa</option><option value='51'>Colégio Estadual Professor Meneleu de Almeida Torres</option><option value='52'>Escola Estadual Monteiro Lobato</option><option value='53'>Colégio Estadual do Campo Doutor Munhoz da Rocha</option><option value='54'>Escola Modalidade Educação Especial Noly Zander</option><option value='55'>Colégio Estadual Nossa Senhora da Glória</option><option value='56'>Colégio Estadual Nossa Senhora das Graças</option><option value='57'>Colégio Estadual General Osório</option><option value='58'>Colégio Estadual Padre Pedro Grzelczaki</option><option value='59'>Colégio Estadual Polivalente</option><option value='60'>Colégio Estadual Regente Feijó</option><option value='61'>Escola Modalidade Educação Especial Professora Rosa Maria Bueno</option><option value='62'>Colégio Estadual Santa Maria</option><option value='63'>Colégio Estadual Professora Sirley Jagas</option><option value='64'>Escola Modalidade Educação Especial Zilda Arns</option></select></td>");
    var cols = "";
    var fimLinha =  $("<td class='actions'><button class='text text-sm btn-danger' onclick='RemoveTableRow(this)' type='button'>Remover</button></td></tr>");
    cols += '<tr>';
    cols += '<td><input type="text" name="id">teste</td>';

    cols += '<td><input type="text" name="nome"></td>'; 
    
    cols += '<td><select name="cargo">'; 
    cols += '<option value="gerente" name="gerente">Gerente</option>';
    cols += '<option value="Professor" name="Professor">Professor</option>';
    cols += '<option value="Programador" name="Programador">Programador</option>';
    cols += '</select></td>';

    cols += '<td><input type="text" name="email"></td>'; 

    cols += '<td><input type="text" name="cpf"></td>'; 
    
    cols += '<td class="actions">';
    cols += '<button class="text text-sm btn-danger" onclick="RemoveTableRow(this)" type="button">Remover</button>';
    cols += '</td>';
    cols += '</tr>';
    //newRow.append(cols);
    newRow.append(fimLinha);
    (newRow).insertAfter($(".hide"));
    // console.log(cols);
});


(function($) {

    RemoveTableRow = function(handler) {
      var tr = $(handler).closest('tr');
  
      tr.fadeOut(400, function(){ 
        tr.remove(); 
      }); 
  
      return false;
    };
    
    
  
  })(jQuery);