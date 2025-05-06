<?php $user = $_SESSION['user']; ?>

<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Dashboard Data Guru</h1>

    <div class="flex bg-gray-200 my-2 h-0.5 rounded"></div>

    <?php if ($user == 'Admin'): ?>
    <div class="flex flex-col w-[400px]">
        <p>Tambah Data Manual</p>
        <button class="bg-green-600 inline-block py-2 my-2 w-[100px] text-center text-sm font-bold rounded text-white" onclick="window.location.href='./?p=data_guru&a=add'">Tambah Data</button>
        <div class="flex">
            <div class="flex bg-gray-200 my-3 h-0.5 rounded w-[45%]"></div>
            <div class="text-gray-200 w-[10%] text-center">Atau</div>
            <div class="flex bg-gray-200 my-3 h-0.5 rounded w-[45%]"></div>
        </div>
        <form action="" class="my-2" method="post" enctype="multipart/form-data">
            <div class="flex gap-2 flex-col">
                <label for="">Tambah Data Excel</label>
                <div class="flex gap-2">
                    <input id="fileExcel" required type="file" name="fileExcel" accept=".xls, .xlsx" class="block text-xs w-[75%] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <button name="simpanExcel" class="bg-green-600 inline-block py-2 w-[25%] text-center text-sm font-bold rounded text-white">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <?php endif ?>

    <div class="table pt-2 w-full">
        <table class="w-full border rounded">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">No</th>
                    <th class="w-2/12 py-2 border-r text-sm font-bold text-gray-600">NIP</th>
                    <th class="w-2/12 py-2 border-r text-sm font-bold text-gray-600">Nama</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Jenis Kelamin</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Jabatan</th>
                    <?php if ($user == 'Admin'): ?>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Aksi</th>
                    <?php endif ?>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $tabel = 'data_guru';
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
                    <td class="py-3 border-r"><?= $row['nip'] ?></td>
                    <td class="py-3 border-r"><?= $row['nama'] ?></td>
                    <td class="py-3 border-r"><?= $row['jenis_kelamin'] ?></td>
                    <td class="py-3 border-r"><?= $row['jabatan'] ?></td>
                    <?php if ($user == 'Admin'): ?>
                    <td>
                        <a href="./?p=data_guru&a=edit&i=<?= $row['id'] ?>"
                            class="bg-yellow-500 w-[50px] py-2 inline-block text-white rounded hover:shadow-lg text-xs font-bold"><i class="bi bi-pencil-square"></i></a>
                        <button onclick="hapus('data_guru', '<?= $row['id'] ?>')"
                            class="bg-red-500 w-[50px] py-2 inline-block text-white rounded hover:shadow-lg text-xs font-bold"><i class="bi bi-trash3-fill"></i></button>
                    </td>
                    <?php endif ?>
                </tr>
                <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>

</div>

<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if (isset($_POST['simpanExcel'])) {

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileExcel"]["name"]);

    if (move_uploaded_file($_FILES["fileExcel"]["tmp_name"], $target_file)) {

        // Membaca file Excel
        $fileType = IOFactory::identify($target_file);
        $reader = IOFactory::createReader($fileType);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($target_file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Mengabaikan baris pertama (header)
        $isFirstRow = true;

        // Memasukkan data ke database
        foreach ($rows as $row) {

            if ($isFirstRow) {
                $isFirstRow = false;
                continue; // Melanjutkan ke iterasi berikutnya untuk melewati header
            }

            $nip = $row[0];
            $nama = $row[1];
            $jk = $row[2];
            $jabatan = $row[3];
            // Tambahkan kolom lainnya sesuai kebutuhan

            // echo $nama . " | " . $nisn . " | " . $tmpt . " | " . $tgl . " | " . $mysqlDate . " | " . $jk . " | " . $as . "<br>";

            $tabel = 'data_guru';
            $field = '(nip, nama, jenis_kelamin, jabatan)';
            $value = "('$nip', '$nama', '$jk', '$jabatan')";

            $query = insert($tabel, $field, $value);
        }
        echo '<script type="text/javascript"> simpanExcel("./?p=data_guru"); </script>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>