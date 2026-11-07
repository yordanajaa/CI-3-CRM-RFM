<?php
define('BASEPATH', 'TRUE');
include __DIR__ . '/../application/config/database.php';
$d = $db['default'];
$m = new mysqli($d['hostname'], $d['username'], $d['password'], $d['database']);

echo "=== CHECKING DATA INSERTED ON 2026-11-04 ===\n";

// 1. penjualan_marketplace
$res = $m->query("SELECT id, nomor_so, no_pesanan, nomor_resi, nama_penerima, source, created_at FROM penjualan_marketplace WHERE DATE(created_at) = '2026-11-04' OR DATE(updated_at) = '2026-11-04'");
echo "penjualan_marketplace (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | SO: {$r['nomor_so']} | Pesanan: {$r['no_pesanan']} | Resi: {$r['nomor_resi']} | Penerima: {$r['nama_penerima']} | Created: {$r['created_at']}\n";
}

// 2. sales_order
$res = $m->query("SELECT id, nomor_so, created_at FROM sales_order WHERE DATE(created_at) = '2026-11-04'");
echo "sales_order (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | SO: {$r['nomor_so']} | Created: {$r['created_at']}\n";
}

// 3. produk
$res = $m->query("SELECT id, kode_produk, nama_produk, created_at FROM produk WHERE DATE(created_at) = '2026-11-04'");
echo "produk (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | Kode: {$r['kode_produk']} | Nama: {$r['nama_produk']} | Created: {$r['created_at']}\n";
}

// 4. pelanggan
$res = $m->query("SELECT id, kode_pelanggan, nama_pelanggan, created_at FROM pelanggan WHERE DATE(created_at) = '2026-11-04'");
echo "pelanggan (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | Kode: {$r['kode_pelanggan']} | Nama: {$r['nama_pelanggan']} | Created: {$r['created_at']}\n";
}

// 5. crm_followup_categories
$res = $m->query("SELECT id, nama_kategori, kode_kategori, created_at FROM crm_followup_categories WHERE DATE(created_at) = '2026-11-04'");
echo "crm_followup_categories (" . $res->num_rows . " rows):\n";
while($r = $res->fetch_assoc()) {
    echo "  ID: {$r['id']} | Nama: {$r['nama_kategori']} | Kode: {$r['kode_kategori']} | Created: {$r['created_at']}\n";
}

// 6. crm_transaction_followup_labels
$res = $m->query("SELECT COUNT(*) as cnt FROM crm_transaction_followup_labels WHERE DATE(created_at) = '2026-11-04'");
$r = $res->fetch_assoc();
echo "crm_transaction_followup_labels created today: {$r['cnt']} rows\n";

