<?php
error_reporting(0);
header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
ob_start("ob_gzhandler");

$id = $_GET["id"];
if (empty($id)) {
    array_map('unlink', array_filter((array) glob("json/*")));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Paper Scissors</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.5.0/js/md5.min.js"></script>
    <script src="script.js"></script>

    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="//use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <div class="container my-5 text-center">
        <h1>Rock Paper Scissors</h1>
    </div>

    <?php if (empty($id)) { ?>
        <div class="container text-center">
            <div class="row">
                <div class="col-6">
                    <div class="input-group input-group-lg pb-5">
                        <input type="hidden" name="md5a" id="md5a" readonly>
                        <input type="text" name="playerA" id="playerA" class="form-control border border-primary rounded-start" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Player A" list="datalistOptions">
                        <button class="btn btn-primary" type="button" id="cpl-1"><i class="fa-solid fa-link"></i> Copy Link</button>
                    </div>
                    <img src="images/l-r.png" id="imgl">
                </div>
                <div class="col-6">
                    <div class="input-group input-group-lg pb-5">
                        <input type="hidden" name="md5b" id="md5b" readonly>
                        <input type="text" name="playerB" id="playerB" class="form-control border border-primary rounded-start" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Player B" list="datalistOptions">
                        <button class="btn btn-primary" type="button" id="cpl-2"><i class="fa-solid fa-link"></i> Copy Link</button>
                    </div>
                    <img src="images/r-r.png" id="imgr">
                </div>
                <div class="col-12 pt-5">
                    <button class="btn btn-primary form-control-lg w-100" type="button" id="cpl-again"><i class="fa-regular fa-circle-play"></i> Start Again</button>
                </div>
            </div>
            <datalist id="datalistOptions">
                <option value="Harry">
                <option value="Oliver">
                <option value="Jack">
                <option value="Alfie">
                <option value="Charlie">
                <option value="Thomas">
                <option value="Jacob">
                <option value="James">
                <option value="Joshua">
                <option value="William">
            </datalist>
        </div>
        <script src="main.js"></script>
    <?php } else { ?>
        <input type="hidden" name="plid" id="plid" value="<?= $id ?>" readonly>
        <div id="divWait" class="container-fluid p-5 text-center">WAIT</div>
        <div id="crps" class="container-fluid p-5 text-center">
            <div class="row">
                <div class="col-12 col-md-4 p-2">
                    <img src="images/r-s.png" id="rps-s" class="rps-icon">
                </div>
                <div class="col-12 col-md-4 p-2">
                    <img src="images/r-r.png" id="rps-r" class="rps-icon">
                </div>
                <div class="col-12 col-md-4 p-2">
                    <img src="images/r-p.png" id="rps-p" class="rps-icon">
                </div>
            </div>
        </div>
        <script src="player.js"></script>
    <?php } ?>

    <div id="tip" class="container mt-5">
    <h3>How to Play</h3>
    Assign players names to both sides. You can use the automation system by typing "Ai" in the player field. <br/>
    Copy player link Send to the player to choose the result.<br/>
    The system will display results when both players have successfully selected the result.<br/>
    </div>
</body>
</html>