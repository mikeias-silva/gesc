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
        
    var newRow = $("<tr><td class='pt-3-half'><input id='tdedit' type='text' value='' name='nomemembro[]'/></td><td class='pt-3-half'><input id='tdedit' type='date' value='' name='nascimentomembro[]'/></td><td class='pt-3-half'><input id='tdedit' type='text' name='trabmembro[]'/></td><td><select id='tdedit' name='escolamembro[]' id='' class='custom-select'><option value=''>Não estuda</option><option value=''> INSERIR LOGICA DAS ESCOLAS PARA MEMBRO FAMILIA</option></select></td>");
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