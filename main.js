$(document).ready(function () {
  function copyToClipboard(text) {
    var textArea = document.createElement("textarea");
    textArea.value = window.location.href + "?id=" + text;
    document.body.appendChild(textArea);

    textArea.select();

    try {
      var successful = document.execCommand("copy");
      var msg = successful ? "successful" : "unsuccessful";
      console.log("Copying text command was " + msg);
    } catch (err) {
      console.log("Oops, unable to copy");
    }

    document.body.removeChild(textArea);
  }

  $("#cpl-1, #cpl-2").prop("disabled", true);

  $("#playerA").keyup(function () {
    if ($(this).val().toLowerCase() == "ai") {
      $("#md5a").val($(this).val());
      $("#cpl-1").prop("disabled", true);
    } else {
      $("#md5a").val(md5("playerA" + $(this).val()));
      $("#cpl-1").prop("disabled", false);
    }
  });

  $("#playerB").keyup(function () {
    if ($(this).val().toLowerCase() == "ai") {
      $("#md5b").val($(this).val());
      $("#cpl-2").prop("disabled", true);
    } else {
      $("#md5b").val(md5("playerB" + $(this).val()));
      $("#cpl-2").prop("disabled", false);
    }
  });

  $("#cpl-1").click(function () {
    var clipboardText = $("#md5a").val();
    copyToClipboard(clipboardText);
  });

  $("#cpl-2").click(function () {
    var clipboardText = $("#md5b").val();
    copyToClipboard(clipboardText);
  });

  $("#cpl-again").click(function () {
    $.get("./again.php");
    loopLi();
  });

  function loopLi() {
    var md5a = $("#md5a").val();
    var md5b = $("#md5b").val();

    $.get(
      "./get.php",
      {
        pla: md5a,
        plb: md5b,
      },
      function (data) {
        if (data.pla != null && data.plb == null) {
          $("#imgl").attr("src", "images/l-w.png");

          setTimeout(loopLi, 1000);
        } else if (data.pla == null && data.plb != null) {
          $("#imgr").attr("src", "images/r-w.png");

          setTimeout(loopLi, 1000);
        } else if (data.pla != null && data.plb != null) {
          $("#imgl").attr("src", "images/l-" + data.pla + ".png");
          $("#imgr").attr("src", "images/r-" + data.plb + ".png");
        } else {
          $("#imgl").attr("src", "images/l-r.png");
          $("#imgr").attr("src", "images/r-r.png");

          setTimeout(loopLi, 1000);
        }
      }
    );
  }
  loopLi();
});
