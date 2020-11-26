<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $peserta = new peserta();

    if(isset($_GET['kd_peserta'])){
        $kode = $_GET['kd_peserta'];
        $data_peserta = $peserta->get_by_id($kode);
    }
    else
    {
        header('Location: peserta.php');
    }

    if(isset($_POST['tombol_ubah'])){
        $kd_peserta = $_POST['kd_peserta'];
        $nm_peserta = $_POST['nm_peserta'];
        $alamat = $_POST['kelas'];
        $tlp = $_POST['ekstrakulikuler'];
        $tlp = $_POST['tempat_lahir'];
        $tlp = $_POST['tanggal_lahir'];
        $tlp = $_POST['alasan'];
        $tlp = $_POST['bakat'];
        $tlp = $_POST['motivasi'];
        $tlp = $_POST['tlp'];
        $tlp = $_POST['izin_ortu'];
        $tlp = $_POST['penyakit'];
        $tlp = $_POST['prosentase'];
        $tlp = $_POST['gambar'];

        $adddata = $peserta->update($kd_peserta, $nm_peserta, $kelas, $ektrakulikuler, $tempat_lahir, $tanggal_lahir, $alasan, $bakat, $motivasi, $tlp, $izin_ortu, $penyakit, $prosentase, $gambar);
        if($adddata){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            document.location='peserta.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Disimpan');
            document.location='pesertaubah.php'
          </script>
          <?php
        }
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>SPK Pengurus OSIS</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">

      <?php include "linkcss.php"; ?>
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php include "navbar.php"; ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <?php include "sidebar.php"; ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">

                                      <div class="card">

                                          <div class="row">
                                              <div class="col-sm-12">

                                                  <div class="card">
                                                      <div class="card-header">
                                                          <h4>Data Peserta</h4>

                                                          <div class="card-header-right"><i
                                                              class="icofont icofont-spinner-alt-5"></i></div>

                                                              <div class="card-header-right">
                                                                  <i class="icofont icofont-spinner-alt-5"></i>
                                                              </div>

                                                          </div>
                                                          <div class="card-block">
                                                            <div class="col-sm-12">
                                                              <form method="post">
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Kode Peserta</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="kd_peserta" value="<?php echo $data_peserta['kd_peserta']; ?>" readonly>
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Nama Peserta</label>
                                                                      <div class="col-sm-4">
                                                                          <input type="text" class="form-control" name="nm_peserta" value="<?php echo $data_peserta['nm_peserta']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Kelas</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="kelas" value="<?php echo $data_peserta['kelas']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Organisasi</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['organisasi']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Ektrakulikuler</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['ekstrakulikuler']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['tempat_lahir']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['tanggal_lahir']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Alamat</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['alamat']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Alasan mengikuti Organisasi</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['alasan']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Bakat</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['bakat']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Motivasi</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['organisasi']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Organisasi</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['motivasi']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Telepon</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['tlp']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Izin Orang Tua</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['izin_ortu']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Penyakit yang diderita</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['penyakit']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Prosentase mengikuti organisasi</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="organisasi" value="<?php echo $data_peserta['prosentase']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">update_gambar</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="gambar" value="<?php echo $data_peserta['gambar']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                    <button type="submit" class="btn btn-success btn-sm" name="tombol_ubah">
                                                                        <i class="icofont icofont-check-circled"></i>Ubah
                                                                    </button>
                                                                    <button type="reset" class="btn btn-inverse btn-sm">
                                                                      <i class="icofont icofont-exchange"></i> Batal
                                                                    </button>
                                                                  </div>
                                                              </form>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>

    <?php include "linkjs.php"; ?>
</body>

</html>
