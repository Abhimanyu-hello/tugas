<?php
function rupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

function gajiHarian($golongan)
{
    if ($golongan == "A") {
        return 200000;
    } elseif ($golongan == "B") {
        return 150000;
    } elseif ($golongan == "C") {
        return 100000;
    } else {
        return 0;
    }
}

function uangLemburHarian($golongan)
{
    if ($golongan == "A") {
        return 75000;
    } elseif ($golongan == "B") {
        return 50000;
    } elseif ($golongan == "C") {
        return 30000;
    } else {
        return 0;
    }
}

$nama      = "Budi";
$golongan  = "B";
$hariKerja = 7;

$gaji   = gajiHarian($golongan);
$lembur = uangLemburHarian($golongan);

echo "<pre>";
if ($gaji == 0) {
    echo "Golongan tidak valid!";
} else {
    echo "===== GAJI & LEMBUR =====\n";
    echo "Nama        : $nama\n";
    echo "Golongan    : $golongan\n";
    echo "Gaji/hari   : " . rupiah($gaji) . "\n";
    echo "Lembur/hari : " . rupiah($lembur) . "\n\n";

    $totalGaji   = 0;
    $totalLembur = 0;

    for ($hari = 1; $hari <= $hariKerja; $hari++) {
        $totalGaji += $gaji;

        if ($hari % 2 == 1 && $hari >= 3) {
            $totalLembur += $lembur;
            $ket = "lembur (+" . rupiah($lembur) . ")";
        } else {
            $ket = "tidak lembur";
        }

        echo "Hari ke-$hari : gaji " . rupiah($gaji) . " | $ket\n";
    }

    $totalAkhir = $totalGaji + $totalLembur;

    echo "\nTotal gaji pokok  : " . rupiah($totalGaji) . "\n";
    echo "Total bonus lembur: " . rupiah($totalLembur) . "\n";
    echo "TOTAL DITERIMA    : " . rupiah($totalAkhir) . "\n";
}
echo "</pre>";
