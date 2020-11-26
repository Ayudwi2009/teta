<?php
class peserta
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "spk_pengurusosis";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function createCode()
    {
        $kode = 0;
        $kodepes = "";

        $query = $this->db->prepare("SELECT ifnull(max(substring(kd_peserta, 2, 2)),0)+1 as kode from peserta");
        $query ->execute();
        $data = $query->fetch();

        if ($data['kode']=="")
        {
            $kode=0;
        }
        else
        {
            $kode = $data['kode'];
        }

        if ($kode > 0 && $kode < 9)
        {
            $kodepes = "P"."0".$kode;
        }
        else if ($kode >=9 && $kode < 99)
        {
            $kodepes = "P".$kode;
        }

        return $kodepes;
    }

    public function add_data($kd_peserta, $nm_peserta, $kelas, $organisasi, $ektrakulikuler, $tempat_lahir, $tanggal_lahir, $alamat, $alasan, $bakat , $motivasi ,$tlp, $izin_ortu, $penyakit,$prosentase ,$gambar)
    {
        $data = $this->db->prepare('INSERT INTO peserta (kd_peserta, nm_peserta,kelas, organisasi, ekstrakulikuler, tempat_lahir, tanggal_lahir, alamat, alasan, bakat, motivasi, tlp, izin_ortu, penyakit, prosentase, gambar ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        $data->bindParam(1, $kd_peserta);
        $data->bindParam(2, $nm_peserta);
        $data->bindParam(3, $kelas);
        $data->bindParam(4, $organisasi);
        $data->bindParam(5, $ekstrakulikuler);
        $data->bindParam(6, $tempat_lahir);
        $data->bindParam(7, $tanggal_lahir);
        $data->bindParam(8, $alamat);
        $data->bindParam(9, $alasan);
        $data->bindParam(10, $bakat);
        $data->bindParam(11, $motivasi);
        $data->bindParam(12, $tlp);
        $data->bindParam(13, $izin_ortu);
        $data->bindParam(14, $penyakit);
        $data->bindParam(15, $prosentase);
        $data->bindParam(16, $gambar);


        $data->execute();
        return $data->rowCount();
    }

    public function show()
    {
        $query = $this->db->prepare("SELECT * from peserta");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($kd_peserta){
        $query = $this->db->prepare("SELECT * from peserta where kd_peserta=?");
        $query->bindParam(1, $kd_peserta);
        $query->execute();
        return $query->fetch();
    }

    public function get_kode($kd_peserta)
    {
      $query = $this->db->prepare("SELECT * from peserta where kd_peserta=?");
      $query->bindParam(1, $kd_peserta);
      $query->execute();
      return $query->fetch();
    }

    public function update($kd_peserta,$nm_peserta, $kelas, $organisasi, $ekstrakulikuler, $tempat_lahir, $tanggal_lahir, $alamat, $alasan, $bakat, $motivasi, $tlp, $izin_ortu, $penyakit, $prosentase, $gambar){
        $query = $this->db->prepare('UPDATE peserta set nm_peserta=?, kelas=?, organisasi=?, ekstrakulikuler=?, tempat_lahir=?, tanggal_lahir=?, alamat=?, alasan=?, bakat=?, motivasi=?, tlp=?, izin_ortu=?, penyakit=?, prosentase=?, gambar=? where kd_peserta=?');

        $query->bindParam(1, $nm_peserta);
        $query->bindParam(2, $alamat);
        $query->bindParam(3, $kelas);
        $query->bindParam(4, $organisasi);
        $query->bindParam(4, $ekstrakulikuler);
        $query->bindParam(4, $tempat_lahir);
        $query->bindParam(4, $tanggal_lahir);
        $query->bindParam(4, $alamat);
        $query->bindParam(4, $alasan);
        $query->bindParam(4, $bakat);
        $query->bindParam(4, $motivasi);
        $query->bindParam(4, $tlp);
        $query->bindParam(4, $izin_ortu);
        $query->bindParam(4, $penyakit);
        $query->bindParam(4, $prosentase);
        $query->bindParam(4, $gambar);


        $query->execute();
        return $query->rowCount();
    }

    public function delete($kd_peserta){
        $query = $this->db->prepare('delete from peserta where kd_peserta=?');


        $query->bindParam(1, $kd_peserta);

        $query->execute();
        return $query->rowCount();
    }
}
?>
