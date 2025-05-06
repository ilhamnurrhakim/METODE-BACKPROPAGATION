<?php
$id = $_GET['i'];
$query = getRecord("data_pendaftar", "*", "WHERE id='$id'");
$row = fetch($query);
?>

<div class="rounded-xl p-5 bg-white shadow-lg">
    <h1 class="font-bold text-xl">Ubah Data Siswa Pendaftar</h1>

    <div class="flex bg-gray-200 mt-2 h-0.5 rounded"></div>

    <div class="py-2">
        <form action="" method="POST">
            <div class="grid grid-cols-1 gap-2">
                <div class="flex">
                    <label for="nama" class="w-[25%] py-2 text-[#07074D] font-medium">Nama</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="nama" type="text" required name="nama" value="<?= $row['nama'] ?>"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="nisn" class="w-[25%] py-2 text-[#07074D] font-medium">NISN</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="nisn" type="number" required name="nisn" value="<?= $row['nisn'] ?>"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="tempat" class="w-[25%] py-2 text-[#07074D] font-medium">Tempat Lahir</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="tempat" type="text" required name="tempat" value="<?= $row['tmpt_lahir'] ?>"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="tgl" class="w-[25%] py-2 text-[#07074D] font-medium">Tanggal Lahir</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="tgl" type="date" required name="tgl" value="<?= $row['tgl_lahir'] ?>"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="flex">
                    <label for="jk" class="w-[25%] py-2 text-[#07074D] font-medium">Jenis Kelamin</label>
                    <div id="jk" class="text-center py-2 w-[10%]">:</div>
                    <?php
                        $a = $row['jk'];
                        if ($a == 'Laki - Laki')
                            $A = "selected";
                        else
                            $A = "";

                        if ($a == 'Perempuan')
                            $B = "selected";
                        else
                            $B = "";
                    ?>
                    <select name="jk" require class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                        <option value="A" <?= $A ?>>Laki - Laki</option>
                        <option value="B" <?= $B ?>>Perempuan</option>
                    </select>
                </div>

                <div class="flex">
                    <label for="as" class="w-[25%] py-2 text-[#07074D] font-medium">Asal Sekolah</label>
                    <div class="text-center py-2 w-[10%]">:</div>
                    <input id="as" type="text" required name="as" value="<?= $row['asal_sekolah'] ?>"
                        class="w-[65%] rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                </div>

                <div class="mt-2 flex flex-row-reverse">
                    <button name="btnSave"
                        class="hover:shadow-form w-[20vh] rounded-md bg-[#6A64F1] py-2 px-8 text-center text-base font-semibold text-white outline-none">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['btnSave'])) {

    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tmpt = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['jk'];
    $as = $_POST['as'];

    $tabel = 'data_pendaftar';
    $where = "id = '$id'";
    $value = "nama = '$nama', nisn = '$nisn', tmpt_lahir = '$tmpt', tgl_lahir = '$tgl', jk = '$jk', asal_sekolah = '$as'";

    $query = update($tabel, $value, $where);

    if ($query) {
        echo '<script type="text/javascript"> Edit("./?p=data_pendaftar"); </script>';
    }
    else {
        echo '<script> gagal("Data gagal disimpan"); </script>';
    }
}
?>