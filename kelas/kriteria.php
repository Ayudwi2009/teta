<?php
class kriteria
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "spk_pengurusosis";
        $username = "root";        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function createCode()
    {
        $kode = 0;
        $kodekri = "";

        $query = $this->db->prepare("SELECT ifnull(max(substring(kd_kriteria, 2, 2)),0)+1 as kode from kriteria");
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
            $kodekri = "K"."0".$kode;
        }
        else if ($kode >=9 && $kode < 99)
        {
            $kodekri = "K".$kode;
        }

        return $kodekri;
    }

    public function add_data($kd_kriteria, $nm_kriteria, $bobot)
    {
        $data = $this->db->prepare('INSERT INTO kriteria (kd_kriteria, nm_kriteria, bobot) VALUES (?, ?, ?)');

        $data->bindParam(1, $kd_kriteria);
        $data->bindParam(2, $nm_kriteria);
        $data->bindParam(3, $bobot);
        $data->execute();
        return $data->rowCount();
    }

    public function show()
    {
        $query = $this->db->prepare("SELECT * from kriteria");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($kd_kriteria){
        $query = $this->db->prepare("SELECT * from kriteria where kd_kriteria=?");
        $query->bindParam(1, $kd_kriteria);
        $query->execute();
        return $query->fetch();
    }

    public function get_kode($kd_kriteria)
    {
      $query = $this->db->prepare("SELECT * from kriteria where kd_kriteria=?");
      $query->bindParam(1, $kd_kriteria);
      $query->execute();
      return $query->fetch();
    }

    public function update($kd_kriteria,$nm_kriteria,$bobot){
        $query = $this->db->prepare('UPDATE kriteria set nm_kriteria=?,bobot=? where kd_kriteria=?');

        $query->bindParam(1, $nm_kriteria);
        $query->bindParam(2, $bobot);
        $query->bindParam(3, $kd_kriteria);

        $query->execute();
        return $query->rowCount();
    }

    public function delete($kd_kriteria){
        $query = $this->db->prepare('delete from kriteria where kd_kriteria=?');


        $query->bindParam(1, $kd_kriteria);

        $query->execute();
        return $query->rowCount();
    }
}
?>
