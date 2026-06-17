<?php
// file: PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik anak
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id = null, $nama = null, $sekolah = null, $nilai = null, $biayaDasar = null, $sk = null, $sponsor = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->skIkatanDinas = $sk;
        $this->instansiSponsor = $sponsor;
    }

    // Implementasi metode abstrak: Jalur kedinasan ada tambahan biaya matrikulasi/seragam sebesar 100.000
    public function hitungTotalBiaya() {
        $biayaTambahan = 100000;
        return $this->biayaPendaftaranDasar + $biayaTambahan;
    }

    public function tampilkanInfoJalur() {
        return "Jalur: Kedinasan | Sponsor: {$this->instansiSponsor} | SK: {$this->skIkatanDinas}";
    }

    // Metode Query Spesifik: Mengambil semua data pendaftar Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
        
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
                $row['sk_ikatan_dinas'],
                $row['instansi_sponsor']
            );
        }
        return $result;
    }
}
?>