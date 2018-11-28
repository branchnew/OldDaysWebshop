$("a").on("click", function() {
  $("a,button,#name").toggleClass("is-hidden");
  $("#name").find("input").val("");
});
