<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ./auth/login.php");
    exit;
}

$user = $_SESSION['user'];

date_default_timezone_set("Asia/Jakarta");

function deteksiWaktu() {
    // Mendapatkan jam saat ini dalam format 24 jam
    $jamSekarang = date("H");

    // Menentukan waktu berdasarkan jam saat ini
    if ($jamSekarang >= 5 && $jamSekarang < 12) {
        return "Pagi";
    } elseif ($jamSekarang >= 12 && $jamSekarang < 15) {
        return "Siang";
    } elseif ($jamSekarang >= 15 && $jamSekarang < 18) {
        return "Sore";
    } else {
        return "Malam";
    }
}

$date = date('d F Y');

$waktu = deteksiWaktu();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/js/alert.js"></script>

    <link rel="stylesheet" href="assets/tailwind/output.css">

    <script src="node_modules/flowbite/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.min.css">

    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <script id="MathJax-script" async src="node_modules/mathjax/es5/tex-mml-chtml.js"></script>

    <title>Prediksi Backpropagation</title>
</head>

<body class="flex flex-col justify-between h-screen bg-gray-200">


    <div class="fixed w-[20%] bg-gray-900 bottom-0 top-0 bg-red shadow-md z-20">
        <div class="absolute bottom-0 top-0 left-0 right-0 p-2 text-center">
            <div class="flex flex-col justify-between h-screen">
                <div>
                    <div class="text-gray-100 text-xl">
                        <div class="p-2.5 mt-1 items-center">
                            <h1 class="font-bold text-gray-200 text-[15px]">PREDIKSI BACKPROPAGATION</h1>
                        </div>
                        <div class="my-2 bg-gray-600 h-[1px]"></div>
                    </div>

                    <a href="./?p=home">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                            <i class="bi bi-house-door-fill"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
                        </div>
                    </a>

                    <!-- Hilangkan Tanda Komentar DI BAWAH ini untuk menyalakan fitur halaman manajemen akun untuk menambahkan atau menghapus akun -->
                    <?php
                    //if ($user == 'Admin') :
                    ?>
                    <!-- <a href="./?p=data_akun">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                            <i class="bi bi-person-vcard"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Manajemen Akun</span>
                        </div>
                    </a> -->
                    <?php //endif ?>

                    <a href="./?p=data_pendaftar">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                            <i class="bi bi-universal-access"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Data Siswa Pendaftar</span>
                        </div>
                    </a>

                    <a href="./?p=data_guru">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                            <i class="bi bi-person-workspace"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Data Guru</span>
                        </div>
                    </a>

                    <a href="./?p=data_spp">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                            <i class="bi bi-cash"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Data Biaya SPP</span>
                        </div>
                    </a>

                    <a href="./?p=data_akreditasi">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                            <i class="bi bi-check2-circle"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Data Akreditasi</span>
                        </div>
                    </a>

                    <a href="./?p=prediksi">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                            <i class="bi bi-calculator-fill"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Prediksi</span>
                        </div>
                    </a>

                    <?php
                    if ($user == 'Pimpinan') :
                    ?>
                    <a href="./?p=riwayat">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                            <i class="bi bi-clock-history"></i>
                            <span class="text-[15px] ml-4 text-gray-200 font-bold">Riwayat Prediksi</span>
                        </div>
                    </a>
                    <?php endif ?>
                </div>

                <div>
                    <div class="my-4 bg-gray-600 h-[1px]"></div>

                    <div class="mb-6">
                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 text-white"">
                            <i class="bi bi-person-circle"></i>
                            <div class="flex justify-between w-full items-center">
                                <span class="text-[15px] ml-4 text-gray-200 font-bold"><?= $user ?></span>
                                <a href="./auth/logout.php" class="cursor-pointer p-2 hover:bg-blue-600 text-white rounded-md mt-1">
                                    <i class="bi bi-box-arrow-in-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-2 w-[80%] h-full ml-[20%] z-10 flex flex-col">

        <div class="fixed top-0 left-[20%] right-0 p-5 bg-white/0 backdrop-blur-sm">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-xl">Selamat <?= $waktu ?></h1>
                <div class="flex flex-col">
                    <h1 class="font-bold text-xl"><?= $date ?></h1>
                    <h1 class="font-bold text-xl text-center" id="clock"></h1>
                </div>
            </div>
        </div>

        <main class="grow mt-[96px]">
            <?php
            //==********** Connection Database **********==//
            include "apps/apis.php";
            include 'apps/functions.php';
            require 'vendor/autoload.php';

            $page = $_GET['p'] ?? '';
            $act = $_GET['a'] ?? '';

            //==********** Router **********==//
            if (!empty($page)) {
                $file = "pages/$page/" . (!empty($act) ? $act : 'view') . ".php";
                if (file_exists($file)) {
                    require $file;
                } else {
                    echo "<div style='display: flex;justify-content: center;margin-top: 20%;font-size:20px'>Maaf, Halaman ini tidak tersedia !</div>";
                }
            }
            else {
                echo "<script>document.location.href='./?p=home'</script>";
            }
            ?>
        </main>

        <div class="z-10">
            <div class="p-10 text-center">
                <label class="py-2 text-[#07074D] font-bold">Copyright © <?= date("Y") ?> - All Right Reserved </label>
                <br>
                <label class="py-2 text-[#07074D] font-bold">Arief Rahmad Yusriadi - 20101152630084</label>
                <br>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-envelope"></i></a>
            </div>
        </div>
    </div>

    <?php if ($page == 'home') : ?>
    <div class="z-0">
        <img src="assets/img/Asset 1.svg" alt="" class="absolute bottom-10 right-10 w-[300px] h-[600px]">
    </div>
    <?php endif ?>

    <script src="assets/js/alert.js"></script>
    <script>
        function dropdown(menu) {
            if (menu === 'account') {
                document.querySelector("#submenu2").classList.toggle("hidden");
                document.querySelector("#arrow2").classList.toggle("rotate-0");
            }

            if (menu === 'manual') {
                document.querySelector("#submenuManual").classList.toggle("hidden");
                document.querySelector("#arrowManual").classList.toggle("rotate-0");
            }
        }

        dropdown('account');
        dropdown('manual');
    </script>

</body>

</html>