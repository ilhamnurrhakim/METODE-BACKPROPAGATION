<?php
$q1 = getRecord("data_pendaftar", "COUNT(nama) AS jumlah", "");
$r1 = fetch($q1);

$q2 = getRecord("data_guru", "COUNT(nama) AS jumlah", "");
$r2 = fetch($q2);

$q3 = getRecord("data_spp", "biaya AS biaya", "");
$r3 = fetch($q3);

$q4 = getRecord("data_akreditasi", "akreditasi AS akre", "");
$r4 = fetch($q4);

$bo_i_array = [
    [-10.1794104153756, -12.9133275482645, 1.02274805598609, 4.17563678965943], //z1
    [11.203739877523, -8.48198391514428, -1.18728233514734, -4.04891674788094], //z2
    [-5.507970378935, -22.2796102709225, 0.357447227684068, 2.10026811453471], //z3
    [8.10647512595336, 2.85614170412792, 6.61321885463446, -6.86760121611688], //z4
    [3.01081610073868, 19.2981560062894, -7.21306646784872, -1.24643054259549], //z5
    [6.76359556262291, 12.177061586028, -1.16868294919112, -8.70448736522364], //z6
    [-2.12284259287336, -16.8044754838373, -7.60513272070795, -4.58529603554729], //z7
    [-8.43419854582064, 8.3587121161659, -3.65266694856123, -7.40820085426396], //z8
    [-10.0607759325096, -8.9803017205405, 6.23987332959843, 0.012042547608985], //z9
    [1.05140678369064, -15.2578978894869, -7.9552219888225, -5.5991607926644], //z10
];

$bo_o_array = [
    -0.995585699178339, 1.64743575607042, -0.506838488924623, -3.36648803659136, -0.569770514041921,
    0.933407466557037, 0.624107232927308, -2.76314767967215, -1.21297340651977, 0.920278739649604
];

$bi_i_array = [
    16.1753754471656, 1.6822342046744, 19.5349912631816, -8.93410323380197, -11.0571343333036,
    -6.81206978610744, 17.5161680082386, 1.42456330897948, 2.80049184345269, 22.0486421811211
];

$bi_o = 0.602724010653016;

?>

<div class="flex flex-col gap-3">
    <!--  Input Prediksi  -->
    <div class="rounded-xl p-5 bg-white shadow-lg w-">
        <h1 class="font-bold text-xl">Prediksi</h1>

        <div class="flex bg-gray-200 mt-2 h-0.5 rounded"></div>

        <div class="my-3">
            <form action="" method="POST">
                <div class="grid grid-cols-1 gap-2">
                    <div class="flex">
                        <label for="x1" class="w-[25%] py-2 text-[#07074D] font-medium">Jumlah Pendaftar</label>
                        <div class="text-center py-2 w-[10%]">:</div>
                        <input type="number" required readonly name="x1" id="x1" value="<?= $r1['jumlah'] ?>"
                            class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    </div>

                    <div class="flex">
                        <label for="x2" class="w-[25%] py-2 text-[#07074D] font-medium">Jumlah Guru</label>
                        <div class="text-center py-2 w-[10%]">:</div>
                        <input type="number" required readonly name="x2" id="x2" value="<?= $r2['jumlah'] ?>"
                            class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    </div>

                    <div class="flex">
                        <label for="x3" class="w-[25%] py-2 text-[#07074D] font-medium">Biaya SPP</label>
                        <div class="text-center py-2 w-[10%]">:</div>
                        <input type="number" required readonly name="x3" id="x3" value="<?= $r3['biaya'] ?>"
                            class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    </div>

                    <div class="flex">
                        <label for="x4" class="w-[25%] py-2 text-[#07074D] font-medium">Akreditasi</label>
                        <div class="text-center py-2 w-[10%]">:</div>
                        <input type="text" required readonly name="x4" id="x4" value="<?= $r4['akre'] ?>"
                            class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    </div>

                    <div class="mt-2 flex flex-row-reverse">
                        <button name="btnPrediksi"
                            class="hover:shadow-form w-[20vh] rounded-md bg-[#6A64F1] py-2 px-8 text-center text-base font-semibold text-white outline-none">Prediksi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["btnPrediksi"])) :

        $x1raw = $_POST["x1"];
        $x2raw = $_POST["x2"];
        $x3raw = $_POST["x3"];
        $x4raw = $_POST["x4"];

        $x1 = normalisasi($x1raw, 56, 249);
        $x2 = normalisasi($x2raw, 14, 28);
        $x3 = normalisasi($x3raw, 100000, 300000);
        if ($x4raw == "A") $x4 = 0.9;
        if ($x4raw == "B") $x4 = 0.1;

        $hasil_zinj = array();
        $hasil_zj = array();

        foreach ($bo_i_array as $k => $i) {
            $hasil_zinj[$k] = forward($bi_i_array[$k], $x1, $x2, $x3, $x4,
                $i[0], $i[1], $i[2], $i[3]);
        }

        foreach ($hasil_zinj as $k => $i) {
            $hasil_zj[$k] = aktivasi($i);
        }

        $hasil_yink = forward_y(
            $bi_o, $hasil_zj[0], $hasil_zj[1], $hasil_zj[2], $hasil_zj[3], $hasil_zj[4], $hasil_zj[5],  $hasil_zj[6], $hasil_zj[7], $hasil_zj[8], $hasil_zj[9],
            $bo_o_array[0], $bo_o_array[1], $bo_o_array[2], $bo_o_array[3], $bo_o_array[4], $bo_o_array[5], $bo_o_array[6], $bo_o_array[7], $bo_o_array[8], $bo_o_array[9]
        );

        $yk = round(aktivasi($hasil_yink), 4);

        $hasil = denormalisasi($yk, 56, 249);

        $tabel = 'data_riwayat';
        $field = '(jumlah_siswa, jumlah_guru, spp, akreditasi, hasil_prediksi)';
        $value = "('$x1raw', '$x2raw', '$x3raw', '$x4raw', '$hasil')";

        $query = insert($tabel, $field, $value);

        if ($query) :
            $_SESSION['x1'] = $x1raw;
            $_SESSION['x2'] = $x2raw;
            $_SESSION['x3'] = $x3raw;
            $_SESSION['x4'] = $x4raw;
            $_SESSION['y'] = $hasil;

    ?>

        <!-- Menampilkan Hasil Prediksi  -->
        <div class="col-span-2 rounded-xl p-5 bg-white shadow-lg">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-xl">Hasil Prediksi</h1>
                <a href="../../../Skripsi/apps/cetak.php" target="_blank"  class="hover:shadow-form w-[60px] rounded-md bg-green-600 py-2 outline-none font-semibold text-center text-white">
                    <i class="bi bi-printer-fill"></i>
                </a>
            </div>

            <div class="flex bg-gray-200 mt-2 h-0.5 rounded"></div>

            <div class="flex">
                <label class="w-[25%] py-2 text-[#07074D] font-medium">Jumlah Pendaftar</label>
                <div class="text-center py-2 w-[10%]">:</div>
                <label class="w-[25%] py-2 text-[#07074D] font-medium"><?= $x1raw ?></label>
            </div>

            <div class="flex">
                <label class="w-[25%] py-2 text-[#07074D] font-medium">Jumlah Guru</label>
                <div class="text-center py-2 w-[10%]">:</div>
                <label class="w-[25%] py-2 text-[#07074D] font-medium"><?= $x2raw ?></label>
            </div>

            <div class="flex">
                <label class="w-[25%] py-2 text-[#07074D] font-medium">Biaya SPP</label>
                <div class="text-center py-2 w-[10%]">:</div>
                <label class="w-[25%] py-2 text-[#07074D] font-medium"><?= $x3raw ?></label>
            </div>

            <div class="flex">
                <label class="w-[25%] py-2 text-[#07074D] font-medium">Akreditasi</label>
                <div class="text-center py-2 w-[10%]">:</div>
                <label class="w-[25%] py-2 text-[#07074D] font-medium"><?= $x4raw ?></label>
            </div>

            <div class="flex bg-gray-200 my-2 h-0.5 rounded"></div>

            <div class="flex">
                <label class="w-[25%] py-2 text-[#07074D] font-medium">Hasil Prediksi</label>
                <div class="text-center py-2 w-[10%]">:</div>
                <label class="w-[25%] py-2 text-[#07074D] font-bold"><?= $hasil ?></label>
            </div>

            <p class="italic">"Hasil dari prediksi di atas menujukkan bahwa perkiraan siswa baru yang akan masuk adalah sebanyak <b><?= $hasil ?></b> siswa"</p>

            <div class="mb-6">
                <div class="p-2.5 mt-3 flex items-center border-2  px-4 duration-300 cursor-pointer hover:bg-gray-200 text-white"
                    onclick="dropdown('manual')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#07074D" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-[#07074D] font-bold">Detail</span>
                        <span class="text-sm rotate-180" id="arrowManual">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#07074D" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="text-left text-sm border-2 border-t-0 p-2 text-gray-200 font-bold" id="submenuManual">

                    <p class="text-gray-600 pb-2">Bobot dan Bias Input ke Hidden Layer</p>
                    <table class="w-full border rounded">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Bobot</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z1</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z2</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z3</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z4</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z5</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z6</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z7</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z8</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z9</th>
                                <th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">Z10</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $transposedArray = array();

                            foreach ($bo_i_array as $row => $columns) {
                                foreach ($columns as $column => $value) {
                                    $transposedArray[$column][$row] = $value;
                                }
                            }
                            // print_r($transposedArray);
                            for ($x=0; $x < 4; $x++) {
                                echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                                echo '<td class="py-3 border-r">X'.$no++.'</td>';
                                for ($y=0; $y < 10; $y++) {
                                    echo '<td class="py-3 border-r">'.$transposedArray[$x][$y].'</td>';
                                }
                                echo '</tr>';
                            }

                            echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                            echo '<td class="py-3 border-r">Bias</td>';
                            for ($i=0; $i < 10; $i++) {
                                echo '<td class="py-3 border-r">'.$bi_i_array[$i].'</td>';
                            }
                            echo '</tr>';
                            ?>
                        </tbody>
                    </table>

                    <p class="text-gray-600 py-2">Bobot dan Bias Input ke Hidden Layer</p>
                    <table class="border rounded w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="w-1/2 py-2 border-r text-sm font-bold text-gray-600 text-center">Bobot</th>
                                <th class="w-1/2 py-2 border-r text-sm font-bold text-gray-600 text-center">y</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            for ($i=0; $i < 10; $i++) {
                                echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                                echo '<td class="py-3 border-r">W'.$no++.'</td>';
                                echo '<td class="py-3 border-r">'.$bo_o_array[$i].'</td>';
                                echo '</tr>';
                            }

                            echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                            echo '<td class="py-3 border-r">Bias</td>';
                            echo '<td class="py-3 border-r">'.$bi_o.'</td>';
                            echo '</tr>';
                            ?>
                        </tbody>
                    </table>

                    <div class="flex bg-gray-200 my-4 h-0.5 rounded"></div>

                    <p class="text-gray-600 pb-2">Normalisasi Input</p>
                    <table class="border rounded w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="w-1/6 py-2 border-r text-sm font-bold text-gray-600 text-center">Input</th>
                                <th class="w-1/6 py-2 border-r text-sm font-bold text-gray-600 text-center">Actual</th>
                                <th class="w-1/6 py-2 border-r text-sm font-bold text-gray-600 text-center">Normalisasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                            echo '<td class="py-3 border-r">X1</td>';
                            echo '<td class="py-3 border-r">'. $x1raw .'</td>';
                            echo '<td class="py-3 border-r">'. $x1 .'</td>';
                            echo '</tr>';
                            echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                            echo '<td class="py-3 border-r">X2</td>';
                            echo '<td class="py-3 border-r">'. $x2raw .'</td>';
                            echo '<td class="py-3 border-r">'. $x2 .'</td>';
                            echo '</tr>';
                            echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                            echo '<td class="py-3 border-r">X3</td>';
                            echo '<td class="py-3 border-r">'. $x3raw .'</td>';
                            echo '<td class="py-3 border-r">'. $x3 .'</td>';
                            echo '</tr>';
                            echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                            echo '<td class="py-3 border-r">X4</td>';
                            echo '<td class="py-3 border-r">'. $x4raw .'</td>';
                            echo '<td class="py-3 border-r">'. $x4 .'</td>';
                            echo '</tr>';
                            ?>
                        </tbody>
                    </table>

                    <div class="flex bg-gray-200 my-4 h-0.5 rounded"></div>

                    <p class="text-gray-600 pb-2">1.1 Hasil Perhitungan \( Z_{inj} \)</p>
                    <table class="border rounded w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <?php
                                for ($i=0; $i < 10; $i++) {
                                    echo '<th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">\( Z_{in'. $i + 1 .'} \)</th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                            for ($i=0; $i < 10; $i++) {
                                echo '<td class="py-3 border-r">'. $hasil_zinj[$i] .'</td>';
                            }
                            echo '</tr>';
                            ?>
                        </tbody>
                    </table>

                    <p class="text-gray-600 py-2">1.2 Hasil Aktivasi \( Z_{inj} \)</p>
                    <table class="border rounded w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <?php
                                for ($i=0; $i < 10; $i++) {
                                    echo '<th class="w-1/10 py-2 border-r text-sm font-bold text-gray-600 text-center">\( Z_'. $i + 1 .' \)</th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                            for ($i=0; $i < 10; $i++) {
                                echo '<td class="py-3 border-r">'. $hasil_zj[$i] .'</td>';
                            }
                            echo '</tr>';
                            ?>
                        </tbody>
                    </table>

                    <div class="flex bg-gray-200 my-4 h-0.5 rounded"></div>

                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <p class="text-gray-600 pb-2">2.1 Hasil Perhitungan \( Y_{ink} \)</p>
                            <table class="border rounded w-full">
                                <thead>
                                    <tr class="bg-gray-50 border-b">
                                        <th class="w-1/6 py-2 border-r text-sm font-bold text-gray-600 text-center">\( Y_{ink} \)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                                    echo '<td class="py-3 border-r">'. $hasil_yink .'</td>';
                                    echo '</tr>';
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <p class="text-gray-600 pb-2">2.2 Hasil Aktivasi \( Y_{ink} \)</p>
                            <table class="border rounded w-full">
                                <thead>
                                    <tr class="bg-gray-50 border-b">
                                        <th class="w-1/6 py-2 border-r text-sm font-bold text-gray-600 text-center">\( Y_{k} \)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                                    echo '<td class="py-3 border-r">'. $yk .'</td>';
                                    echo '</tr>';
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <p class="text-gray-600 pb-2">2.3 Denormalisasi / Hasil</p>
                            <table class="border rounded w-full">
                                <thead>
                                    <tr class="bg-gray-50 border-b">
                                        <th class="w-1/6 py-2 border-r text-sm font-bold text-gray-600 text-center">Denormalisasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    echo '<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">';
                                    echo '<td class="py-3 border-r">'. $hasil .'</td>';
                                    echo '</tr>';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endif ?>
    <?php endif ?>
</div>