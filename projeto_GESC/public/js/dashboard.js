addEventListener("keydown", function(event) {
    if (event.keyCode == 112){
        event.preventDefault();
        $("#help").modal("show");  
    }
});
  /*addEventListener("keyup", function(event) {
    if (event.keyCode == 112)
      document.body.style.background = "";
  });*/