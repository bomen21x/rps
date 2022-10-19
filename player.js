$(document).ready(function () {
  $("#rps-s").click(function () {
    $.get("./put.php", { id: $("#plid").val(), rps: "s" });
    $("#divWait").show();
  });

  $("#rps-p").click(function () {
    $.get("./put.php", { id: $("#plid").val(), rps: "p" });
    $("#divWait").show();
  });

  $("#rps-r").click(function () {
    $.get("./put.php", { id: $("#plid").val(), rps: "r" });
    $("#divWait").show();
  });

  $(function () {
    function loopLi() {
      var plid = $("#plid").val();

      $.get(
        "./ck_file.php",
        {
          ck: plid,
        },
        function (data) {
          if (data.ck == "ok") {
            $("#divWait").show();
            setTimeout(loopLi, 1000);
          } else {
            $("#divWait").hide();
            setTimeout(loopLi, 3000);
          }
        }
      );
    }
    loopLi();
  });
});
