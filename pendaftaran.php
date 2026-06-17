<?php
// file: Pendaftaran.php

abstract class Pendaftaran {
    // Properti/Atribut Terenkapsulasi (Tahap 3)
    // Dipetakan langsung dari kolom induk di tabel_pendaftaran
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Konstruktor untuk inisialisasi/pemetaan nilai dari database
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar) {
        $this->id_pendaftaran = $id;
        $this->nama_calon = $nama;
        $this->asal_sekolah = $sekolah;
        $this->nilai_ujian = $nilai;
        $this->biayaPendaftaranDasar = $biayaDasar;
    }

    // Getter untuk mengakses properti terproteksi dari luar kelas jika diperlukan
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }

    // Metode Abstrak (Tahap 4)
    // Wajib diimplementasikan oleh kelas turunan (Reguler, Prestasi, Kedinasan)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}
?>