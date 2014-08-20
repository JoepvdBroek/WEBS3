$(document).ready(function() {

  $("#hide1").hide();
  $("#hide2").hide();
  $("#hide3").hide();

  $("#toggle1").click(function() {
    $(this).next().slideToggle(300);
  });

  $("#toggle2").click(function() {
    $(this).next().slideToggle(300);
  });

  $("#toggle3").click(function() {
    $(this).next().slideToggle(300);
  });

});