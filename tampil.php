<?php
// file: tampil.php

// Memuat semua komponen model dan koneksi
require_once 'database.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 1. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

// 2. Mengambil Data Secara Dinamis Menggunakan Metode Query Spesifik (Tahap 4)
$daftarReguler   = PendaftaranReguler::getDaftarReguler($db);
$daftarPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$daftarKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

// Fungsi pembantu untuk memformat mata uang Rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendaftaran Mahasiswa Baru - Stone World</title>
    <style>
        /* --- TEMA STONE WORLD STYLING --- */
        :root {
            --bg-stone: #2c302e;
            --stone-dark: #1e2120;
            --stone-light: #3a3f3d;
            --accent-science: #a7c957; /* Hijau asam/kimia khas laboratorium Senku */
            --text-light: #f4f4f2;
            --text-muted: #bdc3c7;
            --border-stone: #4a504d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-stone);
            color: var(--text-light);
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header bertema Kerajaan Sains */
        header {
            text-align: center;
            padding: 30px 20px;
            background: linear-gradient(135deg, var(--stone-dark), var(--stone-light));
            border: 2px solid var(--border-stone);
            border-radius: 8px;
            margin-bottom: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }

        header h1 {
            color: var(--accent-science);
            font-size: 2.2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 5px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
        }

        header p {
            color: var(--text-muted);
            font-style: italic;
        }

        /* Pengelompokan Kategori Jalur (Tahap 6.2) */
        .section-jalur {
            background-color: var(--stone-dark);
            border: 1px solid var(--border-stone);
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 40px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .section-title {
            font-size: 1.5rem;
            color: var(--accent-science);
            border-bottom: 2px solid var(--border-stone);
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .badge-count {
            font-size: 0.9rem;
            background-color: var(--stone-light);
            color: var(--text-light);
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid var(--border-stone);
        }

        /* Styling Tabel yang Rapi dan Jelas */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            text-align: left;
        }

        th {
            background-color: var(--stone-light);
            color: var(--accent-science);
            font-weight: 600;
            padding: 14px 16px;
            border-bottom: 3px solid var(--border-stone);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-stone);
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Baris selang-seling agar mudah dibaca */
        tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.02);
        }

        tbody tr:hover {
            background-color: rgba(167, 201, 87, 0.08); /* Efek hover hijau sains tipis */
            transition: background-color 0.2s ease;
        }

        /* Kolom informasi spesifik polimorfik */
        .info-unik {
            font-size: 0.88rem;
            color: #d1d5db;
            background-color: rgba(0,0,0,0.2);
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
            border-left: 3px solid var(--accent-science);
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .total-biaya {
            font-weight: bold;
            color: #ffca3a; /* Warna emas/kuning cerah untuk hasil kalkulasi biaya akhir */
        }

        .empty-row {
            color: var(--text-muted);
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">

    <header>
        <h1>Kingdom of Science Academy</h1>
        <p>Simulasi Panel Pendaftaran Mahasiswa Baru — DB_SIMULASI_PBO_TRPL1A_Revaliano</p>
    </header>

    <div class="section-jalur">
        <div class="section-title">
            <h2>Jalur Seleksi Reguler</h2>
            <span class="badge-count"><?= count($daftarReguler); ?> Calon Mahasiswa</span>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th width="5%" class="text-center">ID</th>
                        <th width="20%">Nama Calon</th>
                        <th width="20%">Asal Sekolah</th>
                        <th width="10%" class="text-center">Nilai Ujian</th>
                        <th width="25%">Atribut Unik Jalur (Info Jalur)</th>
                        <th width="20%" class="text-right">Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarReguler)): ?>
                        <tr><td colspan="6" class="text-center empty-row">Tidak ada data pendaftar reguler.</td></tr>
                    <?php else: ?>
                        <?php foreach ($daftarReguler as $mhs): ?>
                            <tr>
                                <td class="text-center"><?= $mhs->getIdPendaftaran(); ?></td>
                                <td><strong><?= $mhs->getNamaCalon(); ?></strong></td>
                                <td><?= $mhs->getAsalSekolah(); ?></td>
                                <td class="text-center"><?= $mhs->getNilaiUjian(); ?></td>
                                <td><span class="info-unik"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                                <td class="text-right total-biaya"><?= formatRupiah($mhs->hitungTotalBiaya()); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="section-jalur">
        <div class="section-title">
            <h2>Jalur Apresiasi Prestasi</h2>
            <span class="badge-count"><?= count($daftarPrestasi); ?> Calon Mahasiswa</span>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th width="5%" class="text-center">ID</th>
                        <th width="20%">Nama Calon</th>
                        <th width="20%">Asal Sekolah</th>
                        <th width="10%" class="text-center">Nilai Ujian</th>
                        <th width="25%">Atribut Unik Jalur (Info Jalur)</th>
                        <th width="20%" class="text-right">Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarPrestasi)): ?>
                        <tr><td colspan="6" class="text-center empty-row">Tidak ada data pendaftar prestasi.</td></tr>
                    <?php else: ?>
                        <?php foreach ($daftarPrestasi as $mhs): ?>
                            <tr>
                                <td class="text-center"><?= $mhs->getIdPendaftaran(); ?></td>
                                <td><strong><?= $mhs->getNamaCalon(); ?></strong></td>
                                <td><?= $mhs->getAsalSekolah(); ?></td>
                                <td class="text-center"><?= $mhs->getNilaiUjian(); ?></td>
                                <td><span class="info-unik"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                                <td class="text-right total-biaya"><?= formatRupiah($mhs->hitungTotalBiaya()); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="section-jalur">
        <div class="section-title">
            <h2>Jalur Ikatan Kedinasan</h2>
            <span class="badge-count"><?= count($daftarKedinasan); ?> Calon Mahasiswa</span>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th width="5%" class="text-center">ID</th>
                        <th width="20%">Nama Calon</th>
                        <th width="20%">Asal Sekolah</th>
                        <th width="10%" class="text-center">Nilai Ujian</th>
                        <th width="25%">Atribut Unik Jalur (Info Jalur)</th>
                        <th width="20%" class="text-right">Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarKedinasan)): ?>
                        <tr><td colspan="6" class="text-center empty-row">Tidak ada data pendaftar kedinasan.</td></tr>
                    <?php else: ?>
                        <?php foreach ($daftarKedinasan as $mhs): ?>
                            <tr>
                                <td class="text-center"><?= $mhs->getIdPendaftaran(); ?></td>
                                <td><strong><?= $mhs->getNamaCalon(); ?></strong></td>
                                <td><?= $mhs->getAsalSekolah(); ?></td>
                                <td class="text-center"><?= $mhs->getNilaiUjian(); ?></td>
                                <td><span class="info-unik"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                                <td class="text-right total-biaya"><?= formatRupiah($mhs->hitungTotalBiaya()); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>