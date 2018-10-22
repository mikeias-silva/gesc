var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('#editarVagas').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)  
    var modal = $(this);
    console.log("Editar modal");
    
});

addEventListener("keydown", function(event) {
    if (event.keyCode == 112){
        event.preventDefault();
        $("#help").modal("show");  
    }
});