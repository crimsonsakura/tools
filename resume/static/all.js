$(document).ready(function() {
  $("a.move").click(function(event) {
    event.preventDefault();
    var gethref = $(this).attr("href");
    $("html,body").animate(
      {
        scrollTop: $(gethref).position().top
      },
      1000
    );
  });
});
