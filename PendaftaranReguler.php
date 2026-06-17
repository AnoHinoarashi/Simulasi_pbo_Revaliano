<?php
// file: PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $pilihanProdi;
    private $lokasiKampus;

    // Konstruktor memanggil parent constructor dan menginisialisasi properti spesifik
    public function __construct($id = null, $nama = null, $sekolah = null, $nilai = null, $biayaDasar = null, $prodi = null, $kampus = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->pilihanProdi = $prodi;
        $this->lokasiKampus = $kampus;
    }

    // Implementasi metode abstrak: Total biaya reguler sama dengan biaya dasar
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Implementasi metode abstrak: Menampilkan info spesifik jalur
    public function tampilkanInfoJalur() {
        return "Jalur: Reguler | Prodi: {$this->pilihanProdi} | Lokasi: {$this->lokasiKampus}";
    }

    // Metode Query Spesifik: Mengambil semua data pendaftar Reguler
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Instansiasi objek pendaftaran reguler dari data database
            $result[] = new self(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['pilihan_prodi'],
                $row['lokasi_kampus']
            );
        }
        return $result;
    }
}
?>