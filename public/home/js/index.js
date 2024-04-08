$(document).ready(function () {
  state = true;
  $("#open_nav").on("click", function () {
    if (state) {
      $(".navbar ul").css({
        display: "flex",
      });
    }
    $("#open_nav").css("display", "none");
    $("#close_nav").css("display", "flex");
  });

  $("#close_nav").on("click", function () {
    if (state) {
      $(".navbar ul").css({
        display: "none",
      });
    }
    $("#open_nav").css("display", "flex");
    $("#close_nav").css("display", "none");
  });
  // -------------------------------------
  $height = "100";
  $(window).scroll(function () {
    if ($(window).scrollTop() > $height) {
      $(".navbar").css({
        position: "fixed",
        top: "0",
        "z-index": "99999",
      });
    } else {
      $(".navbar").css({
        position: "static",
        "z-index": "99999",
      });
    }
  });
});
