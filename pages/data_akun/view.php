<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Tabel Data Akun</h1>

    <div class="flex bg-gray-200 my-2 h-0.5 rounded"></div>

    <div class="flex flex-col w-[400px]">
        <button class="bg-green-600 inline-block py-2 my-2 w-[100px] text-center text-sm font-bold rounded text-white" onclick="window.location.href='./?p=data_akun&a=add'">Tambah Data</button>
    </div>

    <div class="table pt-2 w-full">
        <table class="w-full border rounded">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">No</th>
                    <th class="w-2/12 py-2 border-r text-sm font-bold text-gray-600">Username</th>
                    <th class="w-2/12 py-2 border-r text-sm font-bold text-gray-600">Level</th>
                    <th class="w-2/12 py-2 border-r text-sm font-bold text-gray-600">Tanggal Buat</th>
                    <th class="w-2/12 py-2 border-r text-sm font-bold text-gray-600">Tanggal Ubah</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $tabel = 'akun';
                $field = '*';
                $where = '';
                $query = getRecord($tabel, $field, $where);

                if (mysqli_num_rows($query) == 0) {
                ?>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td colspan="8" class="py-3 border-r">Tidak ada data</td>
                </tr>
                <?php
                } else {
                    while ($row = fetch($query)) {
                ?>
                <tr id="tr_<?= $row['id']; ?>" class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="py-3 border-r"><?= $no++ ?></td>
                    <td class="py-3 border-r"><?= $row['username'] ?></td>
                    <td class="py-3 border-r"><?= $row['level'] ?></td>
                    <td class="py-3 border-r"><?= $row['tgl_input'] ?></td>
                    <td class="py-3 border-r"><?= $row['tgl_ubah'] ?></td>
                    <td>
                        <a href="./?p=data_spp&a=edit&i=<?= $row['id'] ?>"
                            class="bg-yellow-500 w-[50px] py-2 inline-block text-white rounded hover:shadow-lg text-xs font-bold"><i class="bi bi-pencil-square"></i></a>
                        <button onclick="hapus('data_spp', '<?= $row['id'] ?>')"
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

</div>