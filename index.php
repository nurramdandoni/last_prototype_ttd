<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- signature -->
<script src="signature_pad.umd.js" type="text/javascript"></script>
</head>
<style>
       .wpp {
        position: relative;
        width: 300px;
        height: 150px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        }

        .signature-pad {
        position: absolute;
        left: 0;
        top: 0;
        width:300px;
        height:150px;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
</style>
<script>
function show_ttd(){
  console.log('ok');
    $('#signature').on('shown.bs.modal', function () {
      var canvas = document.getElementById('signature-pad');
      function resizeCanvas() {
        var ratio =  Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
      }
      window.onresize = resizeCanvas;
      resizeCanvas();

      var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255,255,255,0)' // transparan
      });

      document.getElementById('clear').addEventListener('click', function () {
        signaturePad.clear();
      });

      document.getElementById('save').addEventListener('click', function () {
        if (signaturePad.isEmpty()) {
        return alert("Tanda Tangan Wajib Diisi!");
        }else{
          var img_data = canvas.toDataURL().replace(/^data:image\/(png|jpg);base64,/, "");
          $.ajax({
          url: 'http://localhost/digital_signature_prototype/save.php',
          data: { img_data:img_data},
          type: 'post',
          dataType: 'json',
          success: function (response) {
                console.log(response);
              $('#clear').click();
              $('#close').click();
            }
          });
        }
      });

    });
}
function show_ttd_putih(){
  console.log('ok');
    $('#signature').on('shown.bs.modal', function () {
      var canvas = document.getElementById('signature-pad');
      function resizeCanvas() {
        var ratio =  Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
      }
      window.onresize = resizeCanvas;
      resizeCanvas();

      var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255,255,255)' // transparan putih
      });

      document.getElementById('clear').addEventListener('click', function () {
        signaturePad.clear();
      });

      document.getElementById('save').addEventListener('click', function () {
        if (signaturePad.isEmpty()) {
        return alert("Tanda Tangan Wajib Diisi!");
        }else{
          var img_data = canvas.toDataURL().replace(/^data:image\/(png|jpg);base64,/, "");
          $.ajax({
          url: 'http://localhost/digital_signature_prototype/save.php',
          data: { img_data:img_data},
          type: 'post',
          dataType: 'json',
          success: function (response) {
                console.log(response);
              $('#clear').click();
              $('#close').click();
            }
          });
        }
      });

    });
}
function show_ttd_hitam(){
  console.log('ok');
    $('#signature').on('shown.bs.modal', function () {
      var canvas = document.getElementById('signature-pad');
      function resizeCanvas() {
        var ratio =  Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
      }
      window.onresize = resizeCanvas;
      resizeCanvas();

      var signaturePad = new SignaturePad(canvas, {
        penColor: 'white',
        backgroundColor: 'rgb(0,0,0)' // transparan putih
      });

      document.getElementById('clear').addEventListener('click', function () {
        signaturePad.clear();
      });

      document.getElementById('save').addEventListener('click', function () {
        if (signaturePad.isEmpty()) {
        return alert("Tanda Tangan Wajib Diisi!");
        }else{
          var img_data = canvas.toDataURL().replace(/^data:image\/(png|jpg);base64,/, "");
          $.ajax({
          url: 'http://localhost/digital_signature_prototype/save.php',
          data: { img_data:img_data},
          type: 'post',
          dataType: 'json',
          success: function (response) {
                console.log(response);
              $('#clear').click();
              $('#close').click();
            }
          });
        }
      });

    });
}
</script>

<body>
    <button id="tmbl_ttd" onclick="show_ttd()" type="button" data-toggle="modal" data-target="#signature" class="btn btn-success btn-md" style="margin-left: 15px;">Tanda Tangan Bg Transparan</button>
    <button id="tmbl_ttd" onclick="show_ttd_putih()" type="button" data-toggle="modal" data-target="#signature" class="btn btn-success btn-md" style="margin-left: 15px;">Tanda Tangan Bg Putih</button>
    <button id="tmbl_ttd" onclick="show_ttd_hitam()" type="button" data-toggle="modal" data-target="#signature" class="btn btn-success btn-md" style="margin-left: 15px;">Tanda Tangan Bg Hitam</button>


          <!-- modal sign -->
          <div class="modal fade" id="signature" tabindex="-2" role="dialog" aria-labelledby="signatureLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="signatureLabel">Tanda Tangan Dosen Wali</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <input type="hidden" id="npm_mhs_wali" value="">
            <input id="koor_tmp_sig" type="hidden" value="">
            <form action="#" id="sig_wali">
            <div class="modal-body">
              *<center><div><div class="wpp"><canvas id="signature-pad" class="signature-pad"></canvas></div></div></center><br>* <i>Direkomendasikan menggunakan Smartphone dengan Browser Google Chrome.</i>
            </div>
            <div id="t"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button><button type="button" class="btn btn-primary" id="clear">Ulangi</button><button type="button" class="btn btn-success" id="save">Simpan</button>
              <input type="hidden" id="save-png">
            </div>
            </form>
        </div>
      </div>
    </div>
      <!-- modal sign -->
</body>

</html>