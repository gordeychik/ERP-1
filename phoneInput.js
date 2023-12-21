$(document).ready(() => {
  $(".modalPhone").mask("+7 (999) 999-99-99");
  $(".modalPhone").on("input", function(event) {
    $(this).mask("+7 (999) 999-99-99");
  });
});
