<?php
define('BASEPATH', 'TRUE');
include __DIR__ . '/../application/config/database.php';
$d = $db['default'];
$m = new mysqli($d['hostname'], $d['username'], $d['password'], $d['database']);

echo "=== CHECKING DATA INSERTED ON 2026-11-03 ===\n";

// 1. penjualan_marketplace
$res = $m->query("SELECT id, nomor_so, no_pesanan, nomor_resi, nama_penerima, source, created_at FROM penjualan_marketplace WHERE created_at LIKE '2026-11-03%' OR updated_at LIKE '2026-11-03%'");
echo "penjualan_marketplace (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | SO: {$r['nomor_so']} | Pesanan: {$r['no_pesanan']} | Resi: {$r['nomor_resi']} | Penerima: {$r['nama_penerima']} | Created: {$r['created_at']}\n";
}

// 2. sales_order
$res = $m->query("SELECT id, nomor_so, customer_id, tanggal_so, created_at FROM sales_order WHERE created_at LIKE '2026-11-03%'");
echo "sales_order (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | SO: {$r['nomor_so']} | Tanggal: {$r['tanggal_so']} | Created: {$r['created_at']}\n";
}

// 3. produk (auto-created today)
$res = $m->query("SELECT id, kode_produk, nama_produk, created_at FROM produk WHERE created_at LIKE '2026-11-03%'");
echo "produk (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | Kode: {$r['kode_produk']} | Nama: {$r['nama_produk']} | Created: {$r['created_at']}\n";
}

// 4. pelanggan (auto-created today)
$res = $m->query("SELECT id, kode_pelanggan, nama_pelanggan, created_at FROM pelanggan WHERE created_at LIKE '2026-11-03%'");
echo "pelanggan (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | Kode: {$r['kode_pelanggan']} | Nama: {$r['nama_pelanggan']} | Created: {$r['created_at']}\n";
}

