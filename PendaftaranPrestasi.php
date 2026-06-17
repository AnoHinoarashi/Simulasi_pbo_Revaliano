<?php
// file: PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($id = null, $nama = null, $sekolah = null, $nilai = null, $biayaDasar = null, $jenis = null, $tingkat = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenis;
        $this->tingkatPrestasi = $tingkat;
    }

    // Implementasi metode abstrak: Jalur prestasi mendapatkan potongan biaya pendaftaran sebesar 50.000
    public function hitungTotalBiaya() {
        $potongan = 50000;
        return max(0, $this->biayaPendaftaranDasar - $potongan);
    }

    public function tampilkanInfoJalur() {
        return "Jalur: Prestasi | Jenis: {$this->jenisPrestasi} | Tingkat: {$this->tingkatPrestasi}";
    }

    // Metode Query Spesifik: Mengambil semua data pendaftar Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new self(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['jenis_prestasi'],
                $row['tingkat_prestasi']
            );
        }
        return $result;
    }
}
?>