<?php

$err = null;
$success = false;

if (isset($_POST["enter"])) {

    if ($_POST["beauties"]) {
      $baV = $_POST["beauties"];
    } else {
      $err = "<p>Beauties audience vote?</p>";
    }

    if ($_POST["monstars"]) {
      $maV = $_POST["monstars"];
    } else {
      $err .= "<p>Monstars audience vote?</p>";
    }

    if ($_POST["total"]) {
      $taV = $_POST["total"];
    } else {
      $err .= "<p>Total audience vote?</p>";
    }

    if ($_POST["beauties-j"]) {
      $bjV = $_POST["beauties-j"];
    } else {
      $err .= "<p>Beauties Judge vote?</p>";
    }

    if ($_POST["monstars-j"]) {
      $mjV = $_POST["monstars-j"];
    } else {
      $err .= "<p>Monstars Judge vote?</p>";
    }

    if ($_POST["judge-total"]) {
      $tjV = $_POST["judge-total"];
    } else {
      $err .= "<p>Total judge vote?</p>";
    }

    $bGT = ($baV / $taV) * 0.55 + ($bjV / $tjV) * 0.45;
    $mGT = ($maV / $taV) * 0.55 + ($mjV / $tjV) * 0.45;

    if (!empty($baV) && !empty($maV) && !empty($taV) && !empty($bjV) && !empty($mjV) && !empty($tjV)) {
      $success = true;
      $feed = "<h2>Beauties Audience Vote</h2>" . $baV . ", " .  ($baV / $taV) * 0.55 . "<br>
              <h2>Monstars Audience Vote</h2>" . $maV . ", " .  ($maV / $taV) * 0.55 . "<br>
              <h2>Beauties Judge Vote</h2>" . $bjV . ", " . ($bjV / $tjV) * 0.45 . "<br>
              <h2>Monstars Judge Vote</h2>" . $mjV . ", " . ($mjV / $tjV) * 0.45 . "<br>
              <h1>Beauties Grand Total</h1>" . $bGT . "<br>
              <h1>Monstars Grand Total</h1>" . $mGT;

      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Bout Time Finals</title>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>

<body>
    <h1><i class="fa fa-star" aria-hidden="true"></i>  Bout Time Finals Voting Math  <i class="fa fa-star" aria-hidden="true"></i></h1>

  <form method="post" action="index.php">
    <fieldset>
          <div class="form-box">
            <label>Beauties Audience Vote</label>
            <input type="text" name="beauties" value="<?php if (isset($baV) && !$success) { echo $baV; } ?>">
          </div>
        </div>

            <div class="form-box">
            <label></i>Monstars Audience Vote</label>
            <input type="text" name="monstars" value="<?php if (isset($maV) && !$success) { echo $maV; } ?>">
          </div>
        </div>


          <div class="form-box">
            <label>Total Audience Vote</label>
            <input type="text" name="total" value="<?php if (isset($taV) && !$success) { echo $taV; } ?>">
          </div>
        </div>


            <div class="form-box">
            <label></i>Beauties Judge Vote</label>
            <input type="text" name="beauties-j" value="<?php if (isset($bjV) && !$success) { echo $bjV; } ?>">
          </div>
        </div>


          <div class="form-box">
            <label>Monstars Judge Vote</label>
            <input type="text" name="monstars-j" value="<?php if (isset($mjV) && !$success) { echo $mjV; } ?>">
          </div>
        </div>

            <div class="form-box">
            <label></i>Total Judge Vote</label>
            <input type="text" name="judge-total" value="<?php if (isset($tjV) && !$success) { echo $tjV; } ?>">
          </div>
        </div>


          <div class="insert">
            <input type="submit" name="enter" value="INSERT DATA">
          </div>
            <?php
              if (isset($err)) {
                echo $err;
              }

              if (isset($feed)) {
                echo $feed;
              }

             ?>
      </fieldset>
    </form>
  </body>
</html>
