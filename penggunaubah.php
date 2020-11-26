<?php
    error_reporting();
    //autoload class
    spl_autoload_register(function ($class_name) {
      include 'kelas/'.$class_name.'.php';
    });

    $pengguna= new pengguna();

    if(isset($_GET['kd_pengguna'])){
        $kode = $_GET['kd_pengguna'];
        $data_pengguna = $pengguna->get_by_id($kode);
    }
    else
    {
        header('Location: pengguna.php');
    }

    if(isset($_POST['tombol_ubah'])){
        $kd_pengguna= $_POST['kd_pengguna'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $adddata = $pengguna->update($kd_pengguna, $username, $password, $level);
        if($adddata){ ?>
          <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            document.location='pengguna.php'
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
            alert('Data Gagal Disimpan');
            document.location='penggunaubah.php'
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
                                                          <h4>Data Pengguna</h4>

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
                                                                      <label class="col-sm-2 col-form-label">Kode Pengguna</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="kd_pengguna" value="<?php echo $data_pengguna['kd_pengguna']; ?>" readonly>
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Username</label>
                                                                      <div class="col-sm-4">
                                                                          <input type="text" class="form-control" name="username" value="<?php echo $data_pengguna['username']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Password</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="password" value="<?php echo $data_pengguna['password']; ?>">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group row">
                                                                      <label class="col-sm-2 col-form-label">Level</label>
                                                                      <div class="col-sm-2">
                                                                          <input type="text" class="form-control" name="level" value="<?php echo $data_pengguna['level']; ?>">
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
