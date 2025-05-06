<?php
session_start();

$x1 = $_SESSION["x1"];
$x2 = $_SESSION["x2"];
$x3 = $_SESSION["x3"];
$x4 = $_SESSION["x4"];
$y = $_SESSION["y"];

date_default_timezone_set("Asia/Jakarta");
$tahunajar = date('Y') . '/' . date('Y') + 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/tailwind/output.css">
    <script src="../assets/js/alert.js"></script>

    <title>Cetak Laporan</title>

    <style type="text/css">
        @media print {
            /* Atur gaya cetak di sini */
            body {
                font-family: Arial, sans-serif;
            }
        }
    </style>

    <script>printPage()</script>
</head>

<body class="p-2 px-[30px]">

    <div class="flex flex-col">
        <div class="flex justify-between items-center">

            <div class="flex h-[120px] w-[120px] justify-center">
                <img src="../assets/img/logo.png" alt="">
            </div>
            <div class="flex flex-col">
                <div class="flex flex-col text-center">
                    <p class="text-base">YAYASAN PEMBINA LEMBAGA PENDIDIKAN (YPLP)</p>
                    <P class="text-base">GURU INDONESIA KURANJI PADANG (GIKP)</P>
                </div>
                <div class="flex flex-col text-center">
                    <p class="font-bold text-xl">SMP PGRI 1 PADANG</p>
                    <P class="font-bold text-xl">AKREDITASI "A"</P>
                </div>
            </div>
            <div class="flex h-[120px] w-[120px] justify-center"></div>

        </div>
        <p class="text-sm text-center mt-1">Alamat : Jl. M Yunus Anduring Kec.Kuranji Padang Telp. 0751-39317 Email : smppgrisatupadang@yahoo.com</p>
    </div>

    <div class="border-t border-b border-black w-full my-2"></div>

    <br><br>

    <p class="text-center font-bold underline text-xl">LAPORAN HASIL PREDIKSI JUMLAH SISWA BARU</p>
    <p class="text-center text-xs">No : xxx/xxx/SMP PGRI 1 Padang/YYYY</p>

    <br><br>

    <p class="text-justify indent-10">
        Dalam rangka mempersiapkan penerimaan siswa baru tahun ajaran <?= $tahunajar ?>, kami telah melakukan
        analisis dan prediksi jumlah siswa baru yang akan mendaftar ke SMP PGRI 1 Padang. Berikut adalah beberapa variabel
        yang menjadi penentu prediksi :
    </p>

    <br>

    <div class="table mx-[30px]">
        <table>
            <tr>
                <td>Jumlah Pendaftar</td>
                <td class="px-2">:</td>
                <td><?= $x1 ?> Siswa</td>
            </tr>
            <tr>
                <td>Jumlah Guru</td>
                <td class="px-2">:</td>
                <td><?= $x2 ?> Orang</td>
            </tr>
            <tr>
                <td>Biaya SPP</td>
                <td class="px-2">:</td>
                <td>Rp<?= $x3 ?></td>
            </tr>
            <tr>
                <td>Akreditasi</td>
                <td class="px-2">:</td>
                <td><?= $x4 ?></td>
            </tr>
        </table>
    </div>

    <br>

    <p class="text-justify">
        Berdasarkan variabel diatas bahwa hasil prediksi adalah :
    </p>

    <br>

    <p class="font-bold px-[30px] text-justify">
        "Perkiraan siswa pendaftar yang akan menjadi siswa SMP PGRI 1 Padang pada angkatan <?= $tahunajar ?> adalah <?= $y ?> Siswa."
    </p>

    <br>

    <p class="text-justify indent-10">
        Demikian laporan prediksi ini kami buat untuk menjadi bahan pertimbangan dalam perencanaan dan persiapan penerimaan siswa baru.
        Semoga laporan ini dapat membantu sekolah dalam menentukan langkah-langkah strategis ke depan.
    </p>

</body>
</html>