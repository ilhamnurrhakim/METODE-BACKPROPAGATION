<?php
$user = $_SESSION['user'];

if ($user != 'Pimpinan') {
    echo "<script>window.location.href = './?p=home';</script>";
    exit;
}
?>

<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Dashboard Riwayat Prediksi</h1>

    <div class="flex bg-gray-200 my-2 h-0.5 rounded"></div>

    <div class="table pt-2 w-full">
        <table class="w-full border rounded">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">No</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Jumlah Siswa Pendaftar</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Jumlah Guru</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Biaya SPP</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Akreditasi</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Hasil Prediksi</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Tanggal Prediksi</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $tabel = 'data_riwayat';
                $field = '*';
                $where = '';
                $query = getRecord($tabel, $field, $where);

                if (mysqli_num_rows($query) == 0) {
                ?>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600" id="hideNote1">
                    <td colspan="8" class="py-3 border-r">Tidak ada data</td>
                </tr>
                <?php
                } else {
                    while ($row = fetch($query)) {
                ?>
                <tr id="tr_<?= $row['id']; ?>" class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="py-3 border-r"><?= $no++ ?></td>
                    <td class="py-3 border-r"><?= $row['jumlah_siswa'] ?></td>
                    <td class="py-3 border-r"><?= $row['jumlah_guru'] ?></td>
                    <td class="py-3 border-r">Rp<?= $row['spp'] ?></td>
                    <td class="py-3 border-r"><?= $row['akreditasi'] ?></td>
                    <td class="py-3 border-r"><?= $row['hasil_prediksi'] ?></td>
                    <td class="py-3 border-r"><?= date('d F Y', strtotime($row['tgl_prediksi'])) ?></td>
                    <td>
                        <button onclick="hapus('data_riwayat', '<?= $row['id'] ?>')"
                            class="bg-red-500 w-[50px] py-2 inline-block text-white rounded hover:shadow-lg text-xs font-bold"><i class="bi bi-trash3-fill"></i></button>
                    </td>
                </tr>
                <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>

    <div class="flex bg-gray-200 my-5 h-0.5 rounded"></div>

</div>