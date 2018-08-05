var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function() {
    var $clone = $TABLE.find('tr.hide').clone(true).attr("id", "idpraremover");
    //$TABLE.find('linha').val($linha + 1);
    // console.log($("linha"));
    $TABLE.find('table').append($clone);
});

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
})