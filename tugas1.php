<?php
function tarifHarian($jenis)
{
    if ($jenis == "Sedan") {
        return 300000;
    } elseif ($jenis == "SUV") {
        return 500000;
    } else {
        return 0;
    }
}

function rupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

$jenis    = "SUV";
$lamaSewa = 5;

$tarif = tarifHarian($jenis);

echo "<pre>";
if ($tarif == 0) {
    echo "Jenis kendaraan tidak tersedia!";
} else {
    echo "===== RINCIAN SEWA MOBIL =====\n";
    echo "Jenis kendaraan : $jenis\n";
    echo "Tarif per hari  : " . rupiah($tarif) . "\n";
    echo "Lama sewa       : $lamaSewa hari\n\n";

    $subtotal = 0;

    for ($hari = 1; $hari <= $lamaSewa; $hari++) {
        $subtotal += $tarif;
        echo "Hari ke-$hari : " . rupiah($tarif) . " (akumulasi: " . rupiah($subtotal) . ")\n";
    }

    if ($lamaSewa > 3) {
        $diskon = $subtotal * 0.10;
    } else {
        $diskon = 0;
    }

    $total = $subtotal - $diskon;

    echo "\nSubtotal    : " . rupiah($subtotal) . "\n";
    echo "Diskon 10%  : " . rupiah($diskon) . "\n";
    echo "TOTAL BAYAR : " . rupiah($total) . "\n";
}
echo "</pre>";
