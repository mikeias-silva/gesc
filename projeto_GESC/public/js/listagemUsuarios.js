addEventListener("keydown", function(event) {
    if (event.keyCode == 112){
        event.preventDefault();
        $("#help").modal("show");  
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})