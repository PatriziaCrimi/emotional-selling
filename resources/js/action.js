$( document ).ready(function() {
  // Nascondo tutti i gruppi
  $('.watch').hide();
  // Funzione per visualizzare i team al click del Gruppo
  $(".show").click(function(){
    $(this).next(".watch").toggle(500);
  });
});
