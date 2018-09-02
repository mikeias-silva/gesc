$(document).ready(function(){
  $('#btnmenu').click(function(){
    $('#btnmenu').removeClass('active').addClass('inactive');
     $(this).removeClass('inactive').addClass('active');
    });
})