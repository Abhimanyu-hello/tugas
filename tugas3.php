<?php
function rupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

function hitungBonus($setoran, $batas)
{
    if ($setoran >= $batas) {
        return $setoran * 0.05;
    } else {
        return 0;
    }
}

$saldo         = 100000;
$setoranAwal   = 100000;
$kenaikanSetor = 20000;
$batasBonus    = 150000;
$jumlahBulan   = 8;

echo "<pre>";
echo "===== SIMULASI TABUNGAN ANAK =====\n";
echo "Saldo awal  : " . rupiah($saldo) . "\n";
echo "Batas bonus : setoran >= " . rupiah($batasBonus) . " (bonus 5%)\n\n";

for ($bulan = 1; $bulan <= $jumlahBulan; $bulan++) {
    $setoran = $setoranAwal + ($bulan - 1) * $kenaikanSetor;
    $bonus   = hitungBonus($setoran, $batasBonus);

    $saldo += $setoran + $bonus;

    echo "Bulan ke-$bulan | Setoran: " . rupiah($setoran)
       . " | Bonus: " . rupiah($bonus)
       . " | Saldo: " . rupiah($saldo) . "\n";
}

echo "\nSALDO AKHIR setelah $jumlahBulan bulan: " . rupiah($saldo) . "\n";
echo "</pre>";
