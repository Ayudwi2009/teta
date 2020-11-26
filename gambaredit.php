<?php

	if(isset($_POST['tombol_ubah'])){
        $kd_peserta = $_POST['kd_peserta'];
        $nm_peserta = $_POST['nm_peserta'];
        $alamat = $_POST['alamat'];
        $tlp = $_POST['tlp'];
        $foto_peserta = $_FILES['foto_peserta']['name'];
        $tipe_file = $_FILES['foto_peserta']['type'];
        $tmp = $_FILES['foto_peserta']['tmp_name'];

        if(empty($foto_peserta))
        {
          $status_update1 = $kue->update($kd_peserta,$nm_peserta,$alamat,$tlp);
          if($status_update1)
          {
            ?>
            <script type="text/javascript">
              alert('Data Berhasil Diubah');
              document.location='peserta.php'
            </script>
            <?php
          }
          else
          {
            ?>
            <script type="text/javascript">
              alert('Data Gagal Diubah');
              document.location='pesertaubah.php'
            </script>
            <?php
          }
        }
        else
        {
          $fotobaru = $kd_peserta.'_'.$nm_peserta.'_'.date('dmYHis').'.'.'jpg';
          // Set path folder tempat menyimpan fotonya
          $path = "uploads/".$fotobaru;
          // Proses upload
          $foto_peserta = $fotobaru;

          if(move_uploaded_file($tmp, $path))
          {
            if($tipe_file == "image/jpeg")
            {
              $im_src = imagecreatefromjpeg($path);
              $src_width = imageSX($im_src);
              $src_height= imageSY($im_src);
            }
            else if($tipe_file == "image/png")
            {
              $im_src = imagecreatefrompng($path);
              $src_width = imageSX($im_src);
              $src_height= imageSY($im_src);
            }

            //Simpan dalam ukuran medium 320px
            $dst_width = 400;
            $dst_height = 300;

            //proses untuk perubahan ukuran
            $im = imagecreatetruecolor($dst_width,$dst_height);
            imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

            //menyimpan gambar
              imagejpeg($im,$path);
              imagedestroy($im_src);
              imagedestroy($im);
            unlink("../uploads/".$data_peserta['foto_peserta']); // Hapus file foto sebelumnya yang ada di folder images
            $status_update2 = $peserta->update_gambar($kd_peserta,$nm_peserta,$alamat,$tlp);
            if($status_update2)
            {
              ?>
              <script type="text/javascript">
                alert('Data Berhasil Diubah');
                document.location='peserta.php'
              </script>
              <?php
            }
            else
            {
              ?>
              <script type="text/javascript">
                alert('Data Gagal Diubah');
                document.location='pesertaubah.php'
              </script>
              <?php
            }
          }
        }
      }
?>

//form
  <form method="post"enctype="multipart/form-data">
    <div class="form-group row">
        <label for="foto_kue">Foto Peserta</label>
			<div class="col-sm-7">
			<img src="uploads/<?php echo $data_peserta['foto_peserta']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
			<input type="file" name="foto_peserta" class="form-control" id="foto_peserta" onchange="readURL(this)">
			<img id="blah" src="#" alt="your image" />
			</div>
    </div>
  </form>

//js event onchange
  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        }

        $("#foto_kue").change(function() {
        readURL(this);
        });
   </script>
