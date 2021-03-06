<?php
  include_once 'php/dbh.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="jsqr/grid.js"></script>
  <script type="text/javascript" src="jsqr/version.js"></script>
  <script type="text/javascript" src="jsqr/detector.js"></script>
  <script type="text/javascript" src="jsqr/formatinf.js"></script>
  <script type="text/javascript" src="jsqr/errorlevel.js"></script>
  <script type="text/javascript" src="jsqr/bitmat.js"></script>
  <script type="text/javascript" src="jsqr/datablock.js"></script>
  <script type="text/javascript" src="jsqr/bmparser.js"></script>
  <script type="text/javascript" src="jsqr/datamask.js"></script>
  <script type="text/javascript" src="jsqr/rsdecoder.js"></script>
  <script type="text/javascript" src="jsqr/gf256poly.js"></script>
  <script type="text/javascript" src="jsqr/gf256.js"></script>
  <script type="text/javascript" src="jsqr/decoder.js"></script>
  <script type="text/javascript" src="jsqr/qrcode.js"></script>
  <script type="text/javascript" src="jsqr/findpat.js"></script>
  <script type="text/javascript" src="jsqr/alignpat.js"></script>
  <script type="text/javascript" src="jsqr/databr.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <script> //disable reload
      $(function () {
        $('form').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: 'php/lp.php',
            data: $('form').serialize(),
            success: function () {
              console.log('updated db');
            }
          });
        });
      });
    </script>
</head>
<body>
  <!--<img src="https://api.qrserver.com/v1/create-qr-code/?data=124h422&amp;size=100x100" alt="" title="" />-->
  <div class="card">
    <div>
      <p>some text here</p>
      <form action="php/lp.php" method="POST">
        <input id="lp" type="text" name="lp_num" placeholder="license plate"/>
        <button onClick="formSubmit()">GENERATE QR CODE</button>
    </form>
    </div>

    <div id="returned"></div><!--reserved for QR code-->
    <div id="warning"></div><!--reserved for warning message-->
    <button class="reset" onClick="reset()">RESET</button>
    <p1>Please note that the free allowance is only applicable for up to 2 hours,
       any car parked here for more than that will be required to pay for a ticket at the ticket office.</p1>
  </div>

  <div class="card2">
    <p>some text here</p>
    <div class="video-container">
      <video id="video-preview"></video>
      <canvas id="qr-canvas" class="hidden" ></canvas>
    </div>
    <div id="result"></div><!--reserved for result message-->

  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="vid.js"></script>

</html>
