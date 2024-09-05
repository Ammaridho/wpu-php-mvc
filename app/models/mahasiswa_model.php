<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswaName()
    {
        $sql = "SELECT id, nama, nim FROM " . $this->table;
        $this->db->query($sql);         // set query
        return $this->db->resultSet();  // execute multi data not single
    }

    public function getMahasiswaById($id)
    {
        // $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = ' . $id;
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id=:id '; // query tidak seperti yang atas untuk menghindari sql injection
        $this->db->query($sql);
        $this->db->bind('id', $id); // bind dulu untuk set value idnya dan terhindar sql injection
        return $this->db->single();  // execute single
    }

    public function tambahDataMahasiswa($data)
    {
        $sql = "INSERT INTO " . $this->table . " VALUES ('', :nama, :nim, :email, :jurusan)";
        $this->db->query($sql);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount(); //rowCount dari table db, jika 0 maka aksinya gagal
    }

    public function hapusDataMahasiswa($id)
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id=:id ';
        $this->db->query($sql);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $sql = "UPDATE " . $this->table . " SET nama=:nama, nim=:nim, email=:email, jurusan=:jurusan WHERE id=:id";
        $this->db->query($sql);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getCariMahasiswaName()
    {
        $search = $_POST['search'];
        $sql = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($sql);
        $this->db->bind('keyword', "%$search%"); //pastikan % ikut di bind karena dengan PDO tidak bisa langsung
        return $this->db->resultSet();
    }
}
