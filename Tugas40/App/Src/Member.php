<?php

namespace App\Src;

use App\Config\Config;

class Member
{
    private $db;

    public function __construct()
    {
        $this->db = new Config();
    }

    public function add($id_petugas, $nama, $tgl_lahir, $jenis_kelamin, $alamat, $kontak, $batas_berlaku, $tgl_diperbarui)
    {

        $query = "INSERT INTO tbl_anggota (id_petugas, nama, tgl_lahir, jenis_kelamin, alamat, kontak, batas_berlaku, tgl_diperbarui) VALUES (:id_petugas, :nama, :tgl_lahir, :jenis_kelamin, :alamat, :kontak, :batas_berlaku, :tgl_diperbarui)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_petugas', $id_petugas);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tgl_lahir', $tgl_lahir);
        $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':kontak', $kontak);
        $stmt->bindParam(':batas_berlaku', $batas_berlaku);
        $stmt->bindParam(':tgl_diperbarui', $tgl_diperbarui);
        $stmt->execute();
    }

    public function getAll()
    {
        $query = "SELECT * FROM tbl_anggota WHERE hapus = 0";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function getMemberId($id)
    {
        $query = "SELECT * FROM tbl_anggota WHERE id =:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch($this->db::FETCH_ASSOC);
    }

    public function edit($id, $petugas_id, $nama, $tgl_lahir, $jenis_kelamin, $alamat, $kontak, $batas_berlaku, $tgl_diperbarui)
    {
        $query = "UPDATE tbl_anggota SET id_petugas=:petugas_id, nama=:nama, tgl_lahir=:tgl_lahir, jenis_kelamin=:jenis_kelamin, alamat=:alamat, kontak=:kontak, batas_berlaku=:batas_berlaku, tgl_diperbarui=:tgl_diperbarui WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':petugas_id', $petugas_id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tgl_lahir', $tgl_lahir);
        $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':kontak',$kontak);
        $stmt->bindParam(':batas_berlaku', $batas_berlaku);
        $stmt->bindParam(':tgl_diperbarui', $tgl_diperbarui);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function softDelete($id)
    {
        $query = "UPDATE tbl_anggota SET hapus=1 WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}
 ?>
