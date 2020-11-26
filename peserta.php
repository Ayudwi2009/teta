<?php
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $peserta = new peserta();
    $data_peserta = $peserta->show();

    if(isset($_GET['hapus_peserta']))
   {
       $kd_peserta = $_GET['hapus_peserta'];
       $status_hapus = $peserta->delete($kd_peserta);
       if($status_hapus)
       {
           header('Location: peserta.php');
       }
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>SPK Pengurus OSIS</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <div class="pcoded-container navbar-wrapper">=

            <?php include "navbar.php"; ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <?php include "sidebar.php"; ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                      <div class="col-md-3">
                                          <div class="card">
                                            <a href="pesertatambah.php" class="btn btn-out btn-primary btn-square"><i class="ti ti-folder"></i>&nbsp; Tambah Data</a>
                                          </div>
                                      </div>

                                      <div class="card">
                                          <div class="card-header">
                                              <h4>Data Peserta</h4>

                                              <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                  <li><i class="icofont icofont-simple-left "></i></li>
                                                  <li><i class="icofont icofont-maximize full-card"></i></li>
                                                  <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                  <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                  <li><i class="icofont icofont-error close-card"></i></li>
                                                </ul>
                                              </div>
                                          </div>
                                          <div class="card-block table-border-style">
                                              <div class="table-responsive">
                                                  <table class="table table-hover">
                                                      <thead>
                                                          <tr>
                                                              <th>No</th>
                                                              <th>Kode Peserta</th>
                                                              <th>Nama Peserta</th>
                                                              <th>Kelas</th>
                                                              <th>Organisasi</th>
                                                              <th>Ekstrakulikuler</th>
                                                              <th>Tempat Lahir</th>
                                                              <th>Tanggal Lahir</th>
                                                              <th>Alamat</th>
                                                              <th>Alasan Mengikuti Organisasi</th>
                                                              <th>Bakat</th>
                                                              <th>Motivasi</th>
                                                              <th>Telepon</th>
                                                              <th>Izin Orang Tua</th>
                                                              <th>Penyakit yang diderita</th>
                                                              <th>Prosentase Mengikuti Organisasi</th>
                                                              <th>Gambar</th>
                                                              <th>Aksi</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                          $no = 1;
                                                          foreach($data_peserta as $row)
                                                          {
                                                              echo "<tr>";
                                                              echo "<td>".$no."</td>";
                                                              echo "<td>".$row['kd_peserta']."</td>";
                                                              echo "<td>".$row['nm_peserta']."</td>";
                                                              echo "<td>".$row['kelas']."</td>";
                                                              echo "<td>".$row['organisasi']."</td>";
                                                              echo "<td>".$row['ekstrakulikuler']."</td>";
                                                              echo "<td>".$row['tempat_lahir']."</td>";
                                                              echo "<td>".$row['tanggal_lahir']."</td>";
                                                              echo "<td>".$row['alamat']."</td>";
                                                              echo "<td>".$row['alasan']."</td>";
                                                              echo "<td>".$row['bakat']."</td>";
                                                              echo "<td>".$row['motivasi']."</td>";
                                                              echo "<td>".$row['tlp']."</td>";
                                                              echo "<td>".$row['izin_ortu']."</td>";
                                                              echo "<td>".$row['penyakit']."</td>";
                                                              echo "<td>".$row['prosentase']."</td>";
                                                              echo "<td>".$row['gambar']."</td>";
                                                              echo "<td align='center'><a class='btn btn-info btn-xs' href='pesertaubah.php?kd_peserta=".$row['kd_peserta']."'>Ubah</a>
                                                              <a class='btn btn-danger btn-rounded btn-sm' onclick=\"myFunction('$row[kd_peserta]')\"'>Hapus</a>
                                                              </td>";
                                                              $no++;
                                                          }
                                                        ?>
                                                      </tbody>
                                                  </table>
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
                <script type="text/javascript">
                            function myFunction(kode)
                            {
                                var x;
                                var r = confirm("Yakin Menghapus data ini ?");
                                if (r == true)
                                {
                                    window.location.assign("?page=peserta&hapus_peserta=" + kode);
                                }
                            }
                            </script>

            </div>
        </div>

    <?php include "linkjs.php"; ?>
</body>

</html>
