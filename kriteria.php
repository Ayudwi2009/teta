<?php
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $kriteria = new kriteria();
    $data_kriteria = $kriteria->show();

    if(isset($_GET['hapus_kriteria']))
   {
       $kd_kriteria = $_GET['hapus_kriteria'];
       $status_hapus = $kriteria->delete($kd_kriteria);
       if($status_hapus)
       {
           header('Location: kriteria.php');
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
                                      <div class="col-md-3">
                                          <div class="card">
                                            <a href="kriteriatambah.php" class="btn btn-out btn-primary btn-square"><i class="ti ti-folder"></i>&nbsp; Tambah Data</a>
                                          </div>
                                      </div>

                                      <div class="card">
                                          <div class="card-header">
                                              <h4>Data Kriteria</h4>

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
                                                              <th>Kode Kriteria</th>
                                                              <th>Nama Kriteria</th>
                                                              <th>Bobot</th>
                                                              <th>Aksi</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                          $no = 1;
                                                          foreach($data_kriteria as $row)
                                                          {
                                                              echo "<tr>";
                                                              echo "<td>".$no."</td>";
                                                              echo "<td>".$row['kd_kriteria']."</td>";
                                                              echo "<td>".$row['nm_kriteria']."</td>";
                                                              echo "<td>".$row['bobot']."</td>";
                                                              echo "<td align='center'><a class='btn btn-info btn-xs' href='kriteriaubah.php?kd_kriteria=".$row['kd_kriteria']."'>Ubah</a>
                                                              <a class='btn btn-danger btn-rounded btn-sm' onclick=\"myFunction('$row[kd_kriteria]')\"'>Hapus</a>
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
                                    window.location.assign("?page=kriteria&hapus_kriteria=" + kode);
                                }
                            }
                            </script>

            </div>
        </div>

    <?php include "linkjs.php"; ?>
</body>

</html>
