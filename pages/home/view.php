<?php
$user = $_SESSION['user'];
?>

<div class="flex w-full justify-center pt-[50px]">
    <div class="rounded-xl p-5 bg-white/0 backdrop-blur-sm">
        <div class="flex flex-col items-center">
            <h1 class="font-bold text-xl text-center">Selamat Datang Kembali <?= $user ?></h1>
        </div>
        <div class="flex bg-gray-500 my-2 h-0.5 rounded"></div>

        <div class="flex flex-col items-center pt-2">
            <h1 class="font-bold text-xl text-center">Aplikasi Prediksi Jumlah Siswa Baru</h1>
            <h1 class="font-bold text-xl text-center">Dengan Metode Backpropagation</h1>
        </div>
    </div>
</div>