<?php $user = $_SESSION['user']; ?>

<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Dashboard Data Pendaftar</h1>

    <div class="flex bg-gray-200 my-2 h-0.5 rounded"></div>

    <?php if ($user == 'Admin'): ?>
    <div class="flex flex-col w-[400px]">
        <p>Tambah Data Manual</p>
        <button class="bg-green-600 inline-block py-2 my-2 w-[100px] text-center text-sm font-bold rounded text-white" onclick="window.location.href='./?p=data_pendaftar&a=add'">Tambah Data</button>
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
                    <th class="w-2/12 py-2 border-r text-sm font-bold text-gray-600">Nama</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">NISN</th>
                    <th class="w-2/12 py-2 border-r text-sm font-bold text-gray-600">Tempat/Tanggal Lahir</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Jenis Kelamin</th>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Asal Sekolah</th>
                    <?php if ($user == 'Admin'): ?>
                    <th class="w-1/12 py-2 border-r text-sm font-bold text-gray-600">Aksi</th>
                    <?php endif ?>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $tabel = 'data_pendaftar';
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
                    <td class="py-3 border-r"><?= $row['nama'] ?></td>
                    <td class="py-3 border-r"><?= $row['nisn'] ?></td>
                    <td class="py-3 border-r"><?= $row['tmpt_lahir'] . ", " . date('d F Y', strtotime($row['tgl_lahir'])) ?></td>
                    <td class="py-3 border-r"><?= $row['jk'] ?></td>
                    <td class="py-3 border-r"><?= $row['asal_sekolah'] ?></td>
                    <?php if ($user == 'Admin'): ?>
                    <td>
                        <a href="./?p=data_pendaftar&a=edit&i=<?= $row['id'] ?>"
                            class="bg-yellow-500 w-[50px] py-2 inline-block text-white rounded hover:shadow-lg text-xs font-bold"><i class="bi bi-pencil-square"></i></a>
                        <button onclick="hapus('data_pendaftar', '<?= $row['id'] ?>')"
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

    <div class="flex bg-gray-200 my-5 h-0.5 rounded"></div>

</div>

<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Shared\Date as SharedDate;

if (isset($_POST['simpanExcel'])) {

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileExcel"]["name"]);

    if (move_uploaded_file($_FILES["fileExcel"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["fileExcel"]["name"]). " has been uploaded.";

        // Membaca file Excel
        $fileType = IOFactory::identify($target_file);
        $reader = IOFactory::createReader($fileType);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($target_file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // print_r($rows);

        // Mengabaikan baris pertama (header)
        $isFirstRow = true;

        // Memasukkan data ke database
        foreach ($rows as $row) {

            if ($isFirstRow) {
                $isFirstRow = false;
                continue; // Melanjutkan ke iterasi berikutnya untuk melewati header
            }

            $nama = $row[0];
            $nisn = $row[1];
            $tmpt = $row[2];
            $tgl = $row[3];
            $jk = $row[4];
            $as = $row[5];
            // Tambahkan kolom lainnya sesuai kebutuhan

            // Mengonversi tanggal Excel ke format yang dapat diterima oleh MySQL (YYYY-MM-DD)
            $phpDate = SharedDate::excelToDateTimeObject($tgl);
            $mysqlDate = $phpDate->format('Y-m-d');

            // echo $nama . " | " . $nisn . " | " . $tmpt . " | " . $tgl . " | " . $mysqlDate . " | " . $jk . " | " . $as . "<br>";

            $tabel = 'data_pendaftar';
            $field = '(nama, nisn, tmpt_lahir, tgl_lahir, jk, asal_sekolah)';
            $value = "('$nama', '$nisn', '$tmpt', '$mysqlDate', '$jk', '$as')";

            $query = insert($tabel, $field, $value);
        }
        echo '<script type="text/javascript"> simpanExcel("./?p=data_pendaftar"); </script>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>